<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\AssignedOrgUnit;

use App\Models\AssignedOffice;
use App\Models\OrganizationalUnit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssignedOrgUnitControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_assigned_org_units()
    {
        $assignedOrgUnits = AssignedOrgUnit::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('assigned-org-units.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.assigned_org_units.index')
            ->assertViewHas('assignedOrgUnits');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_assigned_org_unit()
    {
        $response = $this->get(route('assigned-org-units.create'));

        $response->assertOk()->assertViewIs('app.assigned_org_units.create');
    }

    /**
     * @test
     */
    public function it_stores_the_assigned_org_unit()
    {
        $data = AssignedOrgUnit::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('assigned-org-units.store'), $data);

        $this->assertDatabaseHas('assigned_org_units', $data);

        $assignedOrgUnit = AssignedOrgUnit::latest('id')->first();

        $response->assertRedirect(
            route('assigned-org-units.edit', $assignedOrgUnit)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_assigned_org_unit()
    {
        $assignedOrgUnit = AssignedOrgUnit::factory()->create();

        $response = $this->get(
            route('assigned-org-units.show', $assignedOrgUnit)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.assigned_org_units.show')
            ->assertViewHas('assignedOrgUnit');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_assigned_org_unit()
    {
        $assignedOrgUnit = AssignedOrgUnit::factory()->create();

        $response = $this->get(
            route('assigned-org-units.edit', $assignedOrgUnit)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.assigned_org_units.edit')
            ->assertViewHas('assignedOrgUnit');
    }

    /**
     * @test
     */
    public function it_updates_the_assigned_org_unit()
    {
        $assignedOrgUnit = AssignedOrgUnit::factory()->create();

        $assignedOffice = AssignedOffice::factory()->create();
        $organizationalUnit = OrganizationalUnit::factory()->create();

        $data = [
            'assigned_office_id' => $assignedOffice->id,
            'organizational_unit_id' => $organizationalUnit->id,
        ];

        $response = $this->put(
            route('assigned-org-units.update', $assignedOrgUnit),
            $data
        );

        $data['id'] = $assignedOrgUnit->id;

        $this->assertDatabaseHas('assigned_org_units', $data);

        $response->assertRedirect(
            route('assigned-org-units.edit', $assignedOrgUnit)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_assigned_org_unit()
    {
        $assignedOrgUnit = AssignedOrgUnit::factory()->create();

        $response = $this->delete(
            route('assigned-org-units.destroy', $assignedOrgUnit)
        );

        $response->assertRedirect(route('assigned-org-units.index'));

        $this->assertModelMissing($assignedOrgUnit);
    }
}
