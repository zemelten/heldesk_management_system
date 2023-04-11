<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ServiceUnit;

use App\Models\Unit;
use App\Models\Leader;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceUnitControllerTest extends TestCase
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
    public function it_displays_index_view_with_service_units()
    {
        $serviceUnits = ServiceUnit::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('service-units.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.service_units.index')
            ->assertViewHas('serviceUnits');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_service_unit()
    {
        $response = $this->get(route('service-units.create'));

        $response->assertOk()->assertViewIs('app.service_units.create');
    }

    /**
     * @test
     */
    public function it_stores_the_service_unit()
    {
        $data = ServiceUnit::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('service-units.store'), $data);

        $this->assertDatabaseHas('service_units', $data);

        $serviceUnit = ServiceUnit::latest('id')->first();

        $response->assertRedirect(route('service-units.edit', $serviceUnit));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_service_unit()
    {
        $serviceUnit = ServiceUnit::factory()->create();

        $response = $this->get(route('service-units.show', $serviceUnit));

        $response
            ->assertOk()
            ->assertViewIs('app.service_units.show')
            ->assertViewHas('serviceUnit');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_service_unit()
    {
        $serviceUnit = ServiceUnit::factory()->create();

        $response = $this->get(route('service-units.edit', $serviceUnit));

        $response
            ->assertOk()
            ->assertViewIs('app.service_units.edit')
            ->assertViewHas('serviceUnit');
    }

    /**
     * @test
     */
    public function it_updates_the_service_unit()
    {
        $serviceUnit = ServiceUnit::factory()->create();

        $unit = Unit::factory()->create();
        $leader = Leader::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'telephone' => $this->faker->text(12),
            'fax' => $this->faker->randomNumber,
            'email' => $this->faker->email,
            'discription' => $this->faker->text,
            'unit_id' => $unit->id,
            'leader_id' => $leader->id,
        ];

        $response = $this->put(
            route('service-units.update', $serviceUnit),
            $data
        );

        $data['id'] = $serviceUnit->id;

        $this->assertDatabaseHas('service_units', $data);

        $response->assertRedirect(route('service-units.edit', $serviceUnit));
    }

    /**
     * @test
     */
    public function it_deletes_the_service_unit()
    {
        $serviceUnit = ServiceUnit::factory()->create();

        $response = $this->delete(route('service-units.destroy', $serviceUnit));

        $response->assertRedirect(route('service-units.index'));

        $this->assertModelMissing($serviceUnit);
    }
}
