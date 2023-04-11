<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignedOrgUnit extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['assigned_office_id', 'organizational_unit_id'];

    protected $searchableFields = ['*'];

    protected $table = 'assigned_org_units';

    public function assignedOffice()
    {
        return $this->belongsTo(AssignedOffice::class);
    }

    public function organizationalUnit()
    {
        return $this->belongsTo(OrganizationalUnit::class);
    }
}
