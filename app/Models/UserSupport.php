<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSupport extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'user_type',
        'problem_catagory_id',
        'building_id',
        'service_unit_id',
        'unit_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'user_supports';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function problemCatagory()
    {
        return $this->belongsTo(ProblemCatagory::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function serviceUnit()
    {
        return $this->belongsTo(ServiceUnit::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
