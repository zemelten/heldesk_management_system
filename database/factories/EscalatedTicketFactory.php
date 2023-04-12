<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\EscalatedTicket;
use Illuminate\Database\Eloquent\Factories\Factory;

class EscalatedTicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EscalatedTicket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ticket_id' => \App\Models\Ticket::factory(),
            'user_support_id' => \App\Models\UserSupport::factory(),
            'queue_type_id' => \App\Models\QueueType::factory(),
        ];
    }
}
