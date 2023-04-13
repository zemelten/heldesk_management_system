<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\EscalatedTicket;

use App\Models\Ticket;
use App\Models\QueueType;
use App\Models\UserSupport;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EscalatedTicketControllerTest extends TestCase
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
    public function it_displays_index_view_with_escalated_tickets()
    {
        $escalatedTickets = EscalatedTicket::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('escalated-tickets.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.escalated_tickets.index')
            ->assertViewHas('escalatedTickets');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_escalated_ticket()
    {
        $response = $this->get(route('escalated-tickets.create'));

        $response->assertOk()->assertViewIs('app.escalated_tickets.create');
    }

    /**
     * @test
     */
    public function it_stores_the_escalated_ticket()
    {
        $data = EscalatedTicket::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('escalated-tickets.store'), $data);

        $this->assertDatabaseHas('escalated_tickets', $data);

        $escalatedTicket = EscalatedTicket::latest('id')->first();

        $response->assertRedirect(
            route('escalated-tickets.edit', $escalatedTicket)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_escalated_ticket()
    {
        $escalatedTicket = EscalatedTicket::factory()->create();

        $response = $this->get(
            route('escalated-tickets.show', $escalatedTicket)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.escalated_tickets.show')
            ->assertViewHas('escalatedTicket');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_escalated_ticket()
    {
        $escalatedTicket = EscalatedTicket::factory()->create();

        $response = $this->get(
            route('escalated-tickets.edit', $escalatedTicket)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.escalated_tickets.edit')
            ->assertViewHas('escalatedTicket');
    }

    /**
     * @test
     */
    public function it_updates_the_escalated_ticket()
    {
        $escalatedTicket = EscalatedTicket::factory()->create();

        $ticket = Ticket::factory()->create();
        $userSupport = UserSupport::factory()->create();
        $queueType = QueueType::factory()->create();

        $data = [
            'ticket_id' => $ticket->id,
            'user_support_id' => $userSupport->id,
            'queue_type_id' => $queueType->id,
        ];

        $response = $this->put(
            route('escalated-tickets.update', $escalatedTicket),
            $data
        );

        $data['id'] = $escalatedTicket->id;

        $this->assertDatabaseHas('escalated_tickets', $data);

        $response->assertRedirect(
            route('escalated-tickets.edit', $escalatedTicket)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_escalated_ticket()
    {
        $escalatedTicket = EscalatedTicket::factory()->create();

        $response = $this->delete(
            route('escalated-tickets.destroy', $escalatedTicket)
        );

        $response->assertRedirect(route('escalated-tickets.index'));

        $this->assertModelMissing($escalatedTicket);
    }
}
