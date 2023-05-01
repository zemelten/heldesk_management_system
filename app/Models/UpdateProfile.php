<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateProfile extends Model
{
    use HasFactory;
    protected $fillable = ['phone_no', 'email', 'building_id'];
    public static $rules = [
        'phone_no' => ['required', 'regex:/^(\07|0)9[0-9]{8}/'],
    ];
}
