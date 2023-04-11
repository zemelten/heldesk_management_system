<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Customer;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTicketsTest extends TestCase
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
    public function it_gets_customer_tickets()
    {
        $customer = Customer::factory()->create();
        $tickets = Ticket::factory()
            ->count(2)
            ->create([
                'customer_id' => $customer->id,
            ]);

        $response = $this->getJson(
            route('api.customers.tickets.index', $customer)
        );

        $response->assertOk()->assertSee($tickets[0]->description);
    }

    /**
     * @test
     */
    public function it_stores_the_customer_tickets()
    {
        $customer = Customer::factory()->create();
        $data = Ticket::factory()
            ->make([
                'customer_id' => $customer->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.customers.tickets.store', $customer),
            $data
        );

        unset($data['customer_id']);

        $this->assertDatabaseHas('tickets', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $ticket = Ticket::latest('id')->first();

        $this->assertEquals($customer->id, $ticket->customer_id);
    }
}
