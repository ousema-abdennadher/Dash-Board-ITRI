<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Itri_Admin extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasApiTokens, HasFactory, Notifiable;

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->admin_password;
    }

    public function getRememberToken()
    {
        return null; // If you're not using "remember me" functionality
    }

    public function setRememberToken($value)
    {
        // If you're not using "remember me" functionality
    }

    public function getRememberTokenName()
    {
        return null; // If you're not using "remember me" functionality
    }
    
    protected $table = "itri__admins";
    protected $fillable = ["admin_username", "admin_email", "admin_password"];
}
