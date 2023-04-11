<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'building_id',
        'campus_id',
        'organizational_unit_id',
        'floor_id',
        'user_id',
        'is_edited',
        'office_num',
    ];

    protected $searchableFields = ['*'];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function organizationalUnit()
    {
        return $this->belongsTo(OrganizationalUnit::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
