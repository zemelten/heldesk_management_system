<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Building;

use App\Models\Campus;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BuildingControllerTest extends TestCase
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
    public function it_displays_index_view_with_buildings()
    {
        $buildings = Building::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('buildings.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.buildings.index')
            ->assertViewHas('buildings');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_building()
    {
        $response = $this->get(route('buildings.create'));

        $response->assertOk()->assertViewIs('app.buildings.create');
    }

    /**
     * @test
     */
    public function it_stores_the_building()
    {
        $data = Building::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('buildings.store'), $data);

        $this->assertDatabaseHas('buildings', $data);

        $building = Building::latest('id')->first();

        $response->assertRedirect(route('buildings.edit', $building));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_building()
    {
        $building = Building::factory()->create();

        $response = $this->get(route('buildings.show', $building));

        $response
            ->assertOk()
            ->assertViewIs('app.buildings.show')
            ->assertViewHas('building');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_building()
    {
        $building = Building::factory()->create();

        $response = $this->get(route('buildings.edit', $building));

        $response
            ->assertOk()
            ->assertViewIs('app.buildings.edit')
            ->assertViewHas('building');
    }

    /**
     * @test
     */
    public function it_updates_the_building()
    {
        $building = Building::factory()->create();

        $campus = Campus::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'campuse_id' => $campus->id,
        ];

        $response = $this->put(route('buildings.update', $building), $data);

        $data['id'] = $building->id;

        $this->assertDatabaseHas('buildings', $data);

        $response->assertRedirect(route('buildings.edit', $building));
    }

    /**
     * @test
     */
    public function it_deletes_the_building()
    {
        $building = Building::factory()->create();

        $response = $this->delete(route('buildings.destroy', $building));

        $response->assertRedirect(route('buildings.index'));

        $this->assertModelMissing($building);
    }
}
