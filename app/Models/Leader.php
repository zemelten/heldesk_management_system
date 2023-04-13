<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leader extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['full_name', 'sex', 'phone', 'user_id', 'email'];

    protected $searchableFields = ['*'];

    public function serviceUnits()
    {
        return $this->hasMany(ServiceUnit::class);
    }

    public function userSupports()
    {
        return $this->hasMany(UserSupport::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
