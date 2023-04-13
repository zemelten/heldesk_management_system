<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Ticket;

use App\Models\Campus;
use App\Models\Problem;
use App\Models\Reports;
use App\Models\Customer;
use App\Models\Prioritie;
use App\Models\UserSupport;
use App\Models\OrganizationalUnit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TicketControllerTest extends TestCase
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
    public function it_displays_index_view_with_tickets()
    {
        $tickets = Ticket::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('tickets.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.tickets.index')
            ->assertViewHas('tickets');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_ticket()
    {
        $response = $this->get(route('tickets.create'));

        $response->assertOk()->assertViewIs('app.tickets.create');
    }

    /**
     * @test
     */
    public function it_stores_the_ticket()
    {
        $data = Ticket::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('tickets.store'), $data);

        unset($data['reports_id']);

        $this->assertDatabaseHas('tickets', $data);

        $ticket = Ticket::latest('id')->first();

        $response->assertRedirect(route('tickets.edit', $ticket));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_ticket()
    {
        $ticket = Ticket::factory()->create();

        $response = $this->get(route('tickets.show', $ticket));

        $response
            ->assertOk()
            ->assertViewIs('app.tickets.show')
            ->assertViewHas('ticket');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_ticket()
    {
        $ticket = Ticket::factory()->create();

        $response = $this->get(route('tickets.edit', $ticket));

        $response
            ->assertOk()
            ->assertViewIs('app.tickets.edit')
            ->assertViewHas('ticket');
    }

    /**
     * @test
     */
    public function it_updates_the_ticket()
    {
        $ticket = Ticket::factory()->create();

        $campus = Campus::factory()->create();
        $organizationalUnit = OrganizationalUnit::factory()->create();
        $problem = Problem::factory()->create();
        $userSupport = UserSupport::factory()->create();
        $prioritie = Prioritie::factory()->create();
        $customer = Customer::factory()->create();
        $reports = Reports::factory()->create();

        $data = [
            'status' => $this->faker->numberBetween(0, 127),
            'description' => $this->faker->sentence(15),
            'campuse_id' => $campus->id,
            'organizational_unit_id' => $organizationalUnit->id,
            'problem_id' => $problem->id,
            'user_support_id' => $userSupport->id,
            'prioritie_id' => $prioritie->id,
            'customer_id' => $customer->id,
            'reports_id' => $reports->id,
        ];

        $response = $this->put(route('tickets.update', $ticket), $data);

        unset($data['reports_id']);

        $data['id'] = $ticket->id;

        $this->assertDatabaseHas('tickets', $data);

        $response->assertRedirect(route('tickets.edit', $ticket));
    }

    /**
     * @test
     */
    public function it_deletes_the_ticket()
    {
        $ticket = Ticket::factory()->create();

        $response = $this->delete(route('tickets.destroy', $ticket));

        $response->assertRedirect(route('tickets.index'));

        $this->assertModelMissing($ticket);
    }
}
