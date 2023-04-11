<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Floor;
use App\Models\Customer;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FloorCustomersTest extends TestCase
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
    public function it_gets_floor_customers()
    {
        $floor = Floor::factory()->create();
        $customers = Customer::factory()
            ->count(2)
            ->create([
                'floor_id' => $floor->id,
            ]);

        $response = $this->getJson(route('api.floors.customers.index', $floor));

        $response->assertOk()->assertSee($customers[0]->full_name);
    }

    /**
     * @test
     */
    public function it_stores_the_floor_customers()
    {
        $floor = Floor::factory()->create();
        $data = Customer::factory()
            ->make([
                'floor_id' => $floor->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.floors.customers.store', $floor),
            $data
        );

        $this->assertDatabaseHas('customers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $customer = Customer::latest('id')->first();

        $this->assertEquals($floor->id, $customer->floor_id);
    }
}
