<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EscalatedTicket extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['ticket_id', 'user_support_id', 'queue_type_id'];

    protected $searchableFields = ['*'];

    protected $table = 'escalated_tickets';

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function userSupport()
    {
        return $this->belongsTo(UserSupport::class);
    }

    public function queueType()
    {
        return $this->belongsTo(QueueType::class);
    }
}
