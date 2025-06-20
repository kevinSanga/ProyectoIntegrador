<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role_id'];

    protected $hidden = ['password', 'remember_token'];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function isSuperadmin() {
        return $this->role->name === 'superadmin';
    }

    public function isNotario() {
        return $this->role->name === 'notario';
    }

    public function isAyudante() {
        return $this->role->name === 'ayudante';
    }
}

