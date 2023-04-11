<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\AssignedOrgUnit;

use App\Models\AssignedOffice;
use App\Models\OrganizationalUnit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssignedOrgUnitTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_assigned_org_units_list()
    {
        $assignedOrgUnits = AssignedOrgUnit::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.assigned-org-units.index'));

        $response->assertOk()->assertSee($assignedOrgUnits[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_assigned_org_unit()
    {
        $data = AssignedOrgUnit::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.assigned-org-units.store'),
            $data
        );

        $this->assertDatabaseHas('assigned_org_units', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.assigned-org-units.update', $assignedOrgUnit),
            $data
        );

        $data['id'] = $assignedOrgUnit->id;

        $this->assertDatabaseHas('assigned_org_units', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_assigned_org_unit()
    {
        $assignedOrgUnit = AssignedOrgUnit::factory()->create();

        $response = $this->deleteJson(
            route('api.assigned-org-units.destroy', $assignedOrgUnit)
        );

        $this->assertModelMissing($assignedOrgUnit);

        $response->assertNoContent();
    }
}
