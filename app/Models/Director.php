<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Director extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['full_name', 'sex', 'email', 'phone', 'user_id'];

    protected $searchableFields = ['*'];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leaders()
    {
        return $this->hasMany(Leader::class);
    }
}
