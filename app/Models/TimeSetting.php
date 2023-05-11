<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimeSetting extends Model
{
    use HasFactory;
    use Searchable;

<<<<<<< HEAD
    protected $fillable = ['name', 'time'];
=======
    protected $fillable = ['name', 'time','type'];
>>>>>>> ed1045e654c2741bceb7317ca5650a2bfa8a0242

    protected $searchableFields = ['*'];

    protected $table = 'time_settings';
}
