<?php

namespace App\Models;

use App\Models\Traits\UserACLTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, UserACLTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tenant_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Scope a query to only include tenant users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTenantUser($query)
    {
        return $query->where('tenant_id', auth()->user()->tenant_id);
    }

    /**
     * Tenant
     */
    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }

    /**
     * Roles
     */
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    /**
     * Roles not linked with this user
     */
    public function usersAvailable($filter = null){
        $roles = Role::whereNotIn('roles.id', function($query){
            $query->select('role_user.role_id');
            $query->from('role_user');
            $query->whereRaw("role_user.role_id = {$this->id}");
        })
        ->where(function ($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('roles.name', 'LIKE', "%{$filter}%");
        })
        ->paginate();
        return $roles;
    }
}