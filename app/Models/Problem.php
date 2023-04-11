<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Problem extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'description', 'problem_catagory_id'];

    protected $searchableFields = ['*'];

    public function problemCatagory()
    {
        return $this->belongsTo(ProblemCatagory::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
