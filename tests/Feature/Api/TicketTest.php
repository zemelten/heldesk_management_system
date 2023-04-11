<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Ticket;

use App\Models\Campus;
use App\Models\Problem;
use App\Models\Building;
use App\Models\Customer;
use App\Models\Prioritie;
use App\Models\UserSupport;
use App\Models\OrganizationalUnit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TicketTest extends TestCase
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
    public function it_gets_tickets_list()
    {
        $tickets = Ticket::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.tickets.index'));

        $response->assertOk()->assertSee($tickets[0]->description);
    }

    /**
     * @test
     */
    public function it_stores_the_ticket()
    {
        $data = Ticket::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.tickets.store'), $data);

        unset($data['customer_id']);

        $this->assertDatabaseHas('tickets', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_ticket()
    {
        $ticket = Ticket::factory()->create();

        $user = User::factory()->create();
        $campus = Campus::factory()->create();
        $building = Building::factory()->create();
        $organizationalUnit = OrganizationalUnit::factory()->create();
        $problem = Problem::factory()->create();
        $userSupport = UserSupport::factory()->create();
        $prioritie = Prioritie::factory()->create();
        $customer = Customer::factory()->create();

        $data = [
            'status' => $this->faker->numberBetween(0, 127),
            'description' => $this->faker->sentence(15),
            'customer_id' => $user->id,
            'campuse_id' => $campus->id,
            'building_id' => $building->id,
            'organizational_unit_id' => $organizationalUnit->id,
            'problem_id' => $problem->id,
            'user_support_id' => $userSupport->id,
            'prioritie_id' => $prioritie->id,
            'customer_id' => $customer->id,
        ];

        $response = $this->putJson(route('api.tickets.update', $ticket), $data);

        unset($data['customer_id']);

        $data['id'] = $ticket->id;

        $this->assertDatabaseHas('tickets', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_ticket()
    {
        $ticket = Ticket::factory()->create();

        $response = $this->deleteJson(route('api.tickets.destroy', $ticket));

        $this->assertModelMissing($ticket);

        $response->assertNoContent();
    }
}
