<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reports extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_support_id'];

    protected $searchableFields = ['*'];

    public function userSupport()
    {
        return $this->belongsTo(UserSupport::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
