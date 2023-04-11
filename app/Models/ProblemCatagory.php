<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProblemCatagory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'description'];

    protected $searchableFields = ['*'];

    protected $table = 'problem_catagories';

    public function problems()
    {
        return $this->hasMany(Problem::class);
    }

    public function userSupports()
    {
        return $this->hasMany(UserSupport::class);
    }
}
