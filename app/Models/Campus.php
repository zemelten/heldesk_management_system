<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campus extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name'];

    protected $searchableFields = ['*'];

    public function units()
    {
        return $this->hasMany(Unit::class, 'campuse_id');
    }

    public function buildings()
    {
        return $this->hasMany(Building::class, 'campuse_id');
    }

    public function organizationalUnits()
    {
        return $this->hasMany(OrganizationalUnit::class, 'campuse_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'campuse_id');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
