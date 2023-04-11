<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Floor;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FloorTest extends TestCase
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
    public function it_gets_floors_list()
    {
        $floors = Floor::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.floors.index'));

        $response->assertOk()->assertSee($floors[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_floor()
    {
        $data = Floor::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.floors.store'), $data);

        $this->assertDatabaseHas('floors', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(route('api.floors.update', $floor), $data);

        $data['id'] = $floor->id;

        $this->assertDatabaseHas('floors', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_floor()
    {
        $floor = Floor::factory()->create();

        $response = $this->deleteJson(route('api.floors.destroy', $floor));

        $this->assertModelMissing($floor);

        $response->assertNoContent();
    }
}
