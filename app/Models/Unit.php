<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'telephone',
        'fax',
        'email',
        'campuse_id',
        'director_id',
        'building_id',
        'leader_id',
    ];

    protected $searchableFields = ['*'];

    public function campuse()
    {
        return $this->belongsTo(Campus::class, 'campuse_id');
    }

    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function serviceUnits()
    {
        return $this->hasMany(ServiceUnit::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function leader()
    {
        return $this->belongsTo(Leader::class);
    }

    public function userSupports()
    {
        return $this->hasMany(UserSupport::class);
    }
}
