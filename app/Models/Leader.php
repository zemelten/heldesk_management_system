<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leader extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'full_name',
        'sex',
        'phone',
        'email',
        'user_id',
        'director_id',
    ];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function serviceUnits()
    {
        return $this->hasMany(ServiceUnit::class);
    }

    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
