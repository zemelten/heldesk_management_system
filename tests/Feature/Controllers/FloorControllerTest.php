<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Floor;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FloorControllerTest extends TestCase
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
    public function it_displays_index_view_with_floors()
    {
        $floors = Floor::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('floors.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.floors.index')
            ->assertViewHas('floors');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_floor()
    {
        $response = $this->get(route('floors.create'));

        $response->assertOk()->assertViewIs('app.floors.create');
    }

    /**
     * @test
     */
    public function it_stores_the_floor()
    {
        $data = Floor::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('floors.store'), $data);

        $this->assertDatabaseHas('floors', $data);

        $floor = Floor::latest('id')->first();

        $response->assertRedirect(route('floors.edit', $floor));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_floor()
    {
        $floor = Floor::factory()->create();

        $response = $this->get(route('floors.show', $floor));

        $response
            ->assertOk()
            ->assertViewIs('app.floors.show')
            ->assertViewHas('floor');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_floor()
    {
        $floor = Floor::factory()->create();

        $response = $this->get(route('floors.edit', $floor));

        $response
            ->assertOk()
            ->assertViewIs('app.floors.edit')
            ->assertViewHas('floor');
    }

    /**
     * @test
     */
    public function it_updates_the_floor()
    {
        $floor = Floor::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(5),
        ];

        $response = $this->put(route('floors.update', $floor), $data);

        $data['id'] = $floor->id;

        $this->assertDatabaseHas('floors', $data);

        $response->assertRedirect(route('floors.edit', $floor));
    }

    /**
     * @test
     */
    public function it_deletes_the_floor()
    {
        $floor = Floor::factory()->create();

        $response = $this->delete(route('floors.destroy', $floor));

        $response->assertRedirect(route('floors.index'));

        $this->assertModelMissing($floor);
    }
}
