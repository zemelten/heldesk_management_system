<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
      
        'description',
        'campuse_id',
        'problem_id',
        'organizational_unit_id',
      
     
       
    ];

    protected $searchableFields = ['*'];

    public function campuse()
    {
        return $this->belongsTo(Campus::class, 'campuse_id');
    }

    public function organizationalUnit()
    {
        return $this->belongsTo(OrganizationalUnit::class);
    }

    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }

    public function userSupport()
    {
        return $this->belongsTo(UserSupport::class);
    }

    public function prioritie()
    {
        return $this->belongsTo(Prioritie::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function reports()
    {
        return $this->belongsTo(Reports::class);
    }

    public function escalatedTickets()
    {
        return $this->hasMany(EscalatedTicket::class);
    }
}
