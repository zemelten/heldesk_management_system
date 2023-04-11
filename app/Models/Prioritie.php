<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prioritie extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'response', 'description'];

    protected $searchableFields = ['*'];

    public function organizationalUnits()
    {
        return $this->hasMany(OrganizationalUnit::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
