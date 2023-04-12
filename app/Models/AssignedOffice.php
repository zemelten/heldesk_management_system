<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignedOffice extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['office_no', 'building_id'];

    protected $searchableFields = ['*'];

    protected $table = 'assigned_offices';

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function assignedOrgUnits()
    {
        return $this->hasMany(AssignedOrgUnit::class);
    }
}
