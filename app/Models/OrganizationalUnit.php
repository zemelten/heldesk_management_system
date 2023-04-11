<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrganizationalUnit extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'offcie_no',
        'campuse_id',
        'building_id',
        'prioritie_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'organizational_units';

    public function campuse()
    {
        return $this->belongsTo(Campus::class, 'campuse_id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function prioritie()
    {
        return $this->belongsTo(Prioritie::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function assignedOrgUnits()
    {
        return $this->hasMany(AssignedOrgUnit::class);
    }
}
