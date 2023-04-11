<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Customer;

use App\Models\Floor;
use App\Models\Campus;
use App\Models\Building;
use App\Models\OrganizationalUnit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
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
    public function it_gets_customers_list()
    {
        $customers = Customer::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.customers.index'));

        $response->assertOk()->assertSee($customers[0]->full_name);
    }

    /**
     * @test
     */
    public function it_stores_the_customer()
    {
        $data = Customer::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.customers.store'), $data);

        $this->assertDatabaseHas('customers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_customer()
    {
        $customer = Customer::factory()->create();

        $building = Building::factory()->create();
        $campus = Campus::factory()->create();
        $organizationalUnit = OrganizationalUnit::factory()->create();
        $floor = Floor::factory()->create();
        $user = User::factory()->create();

        $data = [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->email,
            'phone_number' => $this->faker->phoneNumber,
            'is_edited' => $this->faker->numberBetween(0, 127),
            'office_num' => $this->faker->text(5),
            'building_id' => $building->id,
            'campus_id' => $campus->id,
            'organizational_unit_id' => $organizationalUnit->id,
            'floor_id' => $floor->id,
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.customers.update', $customer),
            $data
        );

        $data['id'] = $customer->id;

        $this->assertDatabaseHas('customers', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_customer()
    {
        $customer = Customer::factory()->create();

        $response = $this->deleteJson(
            route('api.customers.destroy', $customer)
        );

        $this->assertModelMissing($customer);

        $response->assertNoContent();
    }
}
