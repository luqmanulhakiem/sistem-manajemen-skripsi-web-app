<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_profile',
        'id_fakultas',
        'name',
        'phone',
        'username',
        'email',
        'password',
    ];

    public function profile(): HasOne
    {
        return $this->hasOne(profile::class, 'id', 'id_profile', 'id');
    }
    public function fakultas(): HasOne
    {
        return $this->hasOne(Fakultas::class, 'id', 'id_fakultas', 'id');
    }
    public function prodi(): HasOne
    {
        return $this->hasOne(Prodi::class, 'id', 'id_prodi', 'id');
    }

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
