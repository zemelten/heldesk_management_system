<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    use HasFactory;
    use Searchable;

    protected $fillable = ['full_name', 'username', 'email', 'password'];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'customer_id');
    }

    public function leaders()
    {
        return $this->hasMany(Leader::class);
    }

    public function userSupports()
    {
        return $this->hasMany(UserSupport::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function directors()
    {
        return $this->hasMany(Director::class);
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
    }
}
