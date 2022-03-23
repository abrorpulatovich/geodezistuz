<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'password_text',
        'username',
        'can_login',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function citizen()
    {
        return $this->hasOne(Citizen::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getRole()
    {
        $role = '';

        if ($this->status == 1) {
            $role = "<span class='badge badge-success'><i class='lni lni-user'></i> Jismoniy shaxs</span>";
        } elseif ($this->status == 2) {
            $role = "<span class='badge badge-info'><i class='lni lni-home'></i> Yuridik shaxs</span>";
        } elseif ($this->status == 3) {
            $role = "<span class='badge badge-info'><i class='lni lni-user'></i> Moderator</span>";
        }

        return $role;
    }

    public function getCanDo()
    {
        $cando = "<span class='badge badge-danger'>Yo'q</span>";

        if ($this->can_login) {
            $cando = "<span class='badge badge-success'>Ha</span>";
        }

        return $cando;
    }
}
