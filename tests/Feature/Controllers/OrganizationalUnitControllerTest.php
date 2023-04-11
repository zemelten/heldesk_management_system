<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\OrganizationalUnit;

use App\Models\Campus;
use App\Models\Building;
use App\Models\Prioritie;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrganizationalUnitControllerTest extends TestCase
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
    public function it_displays_index_view_with_organizational_units()
    {
        $organizationalUnits = OrganizationalUnit::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('organizational-units.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.organizational_units.index')
            ->assertViewHas('organizationalUnits');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_organizational_unit()
    {
        $response = $this->get(route('organizational-units.create'));

        $response->assertOk()->assertViewIs('app.organizational_units.create');
    }

    /**
     * @test
     */
    public function it_stores_the_organizational_unit()
    {
        $data = OrganizationalUnit::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('organizational-units.store'), $data);

        $this->assertDatabaseHas('organizational_units', $data);

        $organizationalUnit = OrganizationalUnit::latest('id')->first();

        $response->assertRedirect(
            route('organizational-units.edit', $organizationalUnit)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_organizational_unit()
    {
        $organizationalUnit = OrganizationalUnit::factory()->create();

        $response = $this->get(
            route('organizational-units.show', $organizationalUnit)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.organizational_units.show')
            ->assertViewHas('organizationalUnit');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_organizational_unit()
    {
        $organizationalUnit = OrganizationalUnit::factory()->create();

        $response = $this->get(
            route('organizational-units.edit', $organizationalUnit)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.organizational_units.edit')
            ->assertViewHas('organizationalUnit');
    }

    /**
     * @test
     */
    public function it_updates_the_organizational_unit()
    {
        $organizationalUnit = OrganizationalUnit::factory()->create();

        $campus = Campus::factory()->create();
        $building = Building::factory()->create();
        $prioritie = Prioritie::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'offcie_no' => $this->faker->randomNumber(0),
            'campuse_id' => $campus->id,
            'building_id' => $building->id,
            'prioritie_id' => $prioritie->id,
        ];

        $response = $this->put(
            route('organizational-units.update', $organizationalUnit),
            $data
        );

        $data['id'] = $organizationalUnit->id;

        $this->assertDatabaseHas('organizational_units', $data);

        $response->assertRedirect(
            route('organizational-units.edit', $organizationalUnit)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_organizational_unit()
    {
        $organizationalUnit = OrganizationalUnit::factory()->create();

        $response = $this->delete(
            route('organizational-units.destroy', $organizationalUnit)
        );

        $response->assertRedirect(route('organizational-units.index'));

        $this->assertModelMissing($organizationalUnit);
    }
}
