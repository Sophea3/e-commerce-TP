<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * User has many roles
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Check if user has a specific role
     */
    public function hasRole(string $role): bool
    {
        return $this->roles()->where('name', $role)->exists();
    }

    /**
     * Check if user has a specific permission
     */
    public function hasPermission(string $permission): bool
    {
        return $this->roles()
            ->whereHas('permissions', function ($q) use ($permission) {
                $q->where('name', $permission);
            })
            ->exists();
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function author(){
        return $this->hasOne(Author::class);
    }
    public function authience(){
        return $this->hasONe(Authience::class);
    }
}
