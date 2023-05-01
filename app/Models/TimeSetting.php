<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimeSetting extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'time'];

    protected $searchableFields = ['*'];

    protected $table = 'time_settings';
}
