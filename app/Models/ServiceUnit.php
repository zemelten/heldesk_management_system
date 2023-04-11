<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceUnit extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'telephone',
        'fax',
        'email',
        'discription',
        'unit_id',
        'leader_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'service_units';

    public function unit()
    {
        return $this->belongsTo(Unit::class);
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
