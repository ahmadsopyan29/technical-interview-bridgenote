<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAllUser()
    {

        $query = User::select('users.id', 'users.name', 'users.email', 'position.user_id', 'position.status', 'position.position')
            ->leftJoin('position', 'users.id', '=', 'position.user_id')
            ->get();
        return $query;
    }

    public function getUserById($id)
    {
        $query = User::select('id', 'name', 'email')->where('id', '=', $id)->firstOrFail();
        return $query;
    }

    public function updateWithPassword($request)
    {
        $query = User::where('id', $request->id)
            ->update(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password)]);
        return $query;
    }

    public function updateWithoutPassword($request)
    {
        $query = User::where('id', $request->id)
            ->update(['name' => $request->name, 'email' => $request->email]);
        return $query;
    }
}
