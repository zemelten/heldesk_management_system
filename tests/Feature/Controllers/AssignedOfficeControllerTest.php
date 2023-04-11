<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\AssignedOffice;

use App\Models\Building;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssignedOfficeControllerTest extends TestCase
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
    public function it_displays_index_view_with_assigned_offices()
    {
        $assignedOffices = AssignedOffice::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('assigned-offices.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.assigned_offices.index')
            ->assertViewHas('assignedOffices');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_assigned_office()
    {
        $response = $this->get(route('assigned-offices.create'));

        $response->assertOk()->assertViewIs('app.assigned_offices.create');
    }

    /**
     * @test
     */
    public function it_stores_the_assigned_office()
    {
        $data = AssignedOffice::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('assigned-offices.store'), $data);

        $this->assertDatabaseHas('assigned_offices', $data);

        $assignedOffice = AssignedOffice::latest('id')->first();

        $response->assertRedirect(
            route('assigned-offices.edit', $assignedOffice)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_assigned_office()
    {
        $assignedOffice = AssignedOffice::factory()->create();

        $response = $this->get(route('assigned-offices.show', $assignedOffice));

        $response
            ->assertOk()
            ->assertViewIs('app.assigned_offices.show')
            ->assertViewHas('assignedOffice');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_assigned_office()
    {
        $assignedOffice = AssignedOffice::factory()->create();

        $response = $this->get(route('assigned-offices.edit', $assignedOffice));

        $response
            ->assertOk()
            ->assertViewIs('app.assigned_offices.edit')
            ->assertViewHas('assignedOffice');
    }

    /**
     * @test
     */
    public function it_updates_the_assigned_office()
    {
        $assignedOffice = AssignedOffice::factory()->create();

        $building = Building::factory()->create();

        $data = [
            'office_number' => $this->faker->text(10),
            'building_id' => $building->id,
        ];

        $response = $this->put(
            route('assigned-offices.update', $assignedOffice),
            $data
        );

        $data['id'] = $assignedOffice->id;

        $this->assertDatabaseHas('assigned_offices', $data);

        $response->assertRedirect(
            route('assigned-offices.edit', $assignedOffice)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_assigned_office()
    {
        $assignedOffice = AssignedOffice::factory()->create();

        $response = $this->delete(
            route('assigned-offices.destroy', $assignedOffice)
        );

        $response->assertRedirect(route('assigned-offices.index'));

        $this->assertModelMissing($assignedOffice);
    }
}
