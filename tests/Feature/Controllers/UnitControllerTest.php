<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Unit;

use App\Models\Campus;
use App\Models\Leader;
use App\Models\Director;
use App\Models\Building;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnitControllerTest extends TestCase
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
    public function it_displays_index_view_with_units()
    {
        $units = Unit::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('units.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.units.index')
            ->assertViewHas('units');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_unit()
    {
        $response = $this->get(route('units.create'));

        $response->assertOk()->assertViewIs('app.units.create');
    }

    /**
     * @test
     */
    public function it_stores_the_unit()
    {
        $data = Unit::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('units.store'), $data);

        $this->assertDatabaseHas('units', $data);

        $unit = Unit::latest('id')->first();

        $response->assertRedirect(route('units.edit', $unit));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_unit()
    {
        $unit = Unit::factory()->create();

        $response = $this->get(route('units.show', $unit));

        $response
            ->assertOk()
            ->assertViewIs('app.units.show')
            ->assertViewHas('unit');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_unit()
    {
        $unit = Unit::factory()->create();

        $response = $this->get(route('units.edit', $unit));

        $response
            ->assertOk()
            ->assertViewIs('app.units.edit')
            ->assertViewHas('unit');
    }

    /**
     * @test
     */
    public function it_updates_the_unit()
    {
        $unit = Unit::factory()->create();

        $campus = Campus::factory()->create();
        $director = Director::factory()->create();
        $building = Building::factory()->create();
        $leader = Leader::factory()->create();

        $data = [
            'telephone' => $this->faker->text(12),
            'fax' => $this->faker->text(12),
            'email' => $this->faker->email,
            'campuse_id' => $campus->id,
            'director_id' => $director->id,
            'building_id' => $building->id,
            'leader_id' => $leader->id,
        ];

        $response = $this->put(route('units.update', $unit), $data);

        $data['id'] = $unit->id;

        $this->assertDatabaseHas('units', $data);

        $response->assertRedirect(route('units.edit', $unit));
    }

    /**
     * @test
     */
    public function it_deletes_the_unit()
    {
        $unit = Unit::factory()->create();

        $response = $this->delete(route('units.destroy', $unit));

        $response->assertRedirect(route('units.index'));

        $this->assertModelMissing($unit);
    }
}
