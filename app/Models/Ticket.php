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
        'status',
        'description',
        'customer_id',
        'campuse_id',
        'building_id',
        'problem_id',
        'organizational_unit_id',
        'user_support_id',
        'prioritie_id',
        'customer_id',
    ];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function campuse()
    {
        return $this->belongsTo(Campus::class, 'campuse_id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
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
}
