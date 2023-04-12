<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'campuse_id'];

    protected $searchableFields = ['*'];

    public function campuse()
    {
        return $this->belongsTo(Campus::class, 'campuse_id');
    }

    public function organizationalUnits()
    {
        return $this->hasMany(OrganizationalUnit::class);
    }

    public function assignedOffices()
    {
        return $this->hasMany(AssignedOffice::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function userSupports()
    {
        return $this->hasMany(UserSupport::class);
    }
}
