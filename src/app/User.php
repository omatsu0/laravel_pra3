<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    //Enum設定
    public function getRoleAttribute()
    {
        return new Role($this->role_code);
    }
    public function setRoleAttribute(Role $role)
    {
        $this->role_code = $role->getValue();
    }

    public function getIsAdminAttribute()
    {
        return $this->role->equals(Role::Admin());
    }

    public function getIsAuthorizerAttribute()
    {
        return $this->role->equals(Role::Authorizer());
    }

    public function getIsApplicantAttribute()
    {
        return $this->role->equals(Role::APPLICANT());
    }

    public function getRoleLabelAttribute()
    {
        return $this->role->getLabel();
    }
}
