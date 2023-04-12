<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QueueType extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['queue_name'];

    protected $searchableFields = ['*'];

    protected $table = 'queue_types';

    public function escalatedTickets()
    {
        return $this->hasMany(EscalatedTicket::class);
    }
}
