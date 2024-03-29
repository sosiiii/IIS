<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            $user->profile()->create([
                'title' => $user->name.' profile',
                'description' => 'N/A'
            ]);
        });
    }
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function commentrating()
    {
        return $this->hasMany(CommentRating::class);
    }
    public function isGroupAdmin($name)
    {
        $result = $this->groups()->where('name', '=', $name)
        ->wherePivot('role', '=', 'admin')->first();
        return $result != null;
    }
    public function isMember($name)
    {
        $result = $this->groups()->where('name', '=', $name)
        ->wherePivotIn('role', ['admin', 'manager', 'member'])->first();
        return $result != null;
    }
    public function isAdmin()
    {
        if($this->roles->whereIn('name', 'admin')->first())
        {
            return true;
        }
        return false;
    }
    public function isUser()
    {
        if($this->isAdmin() || $this->roles->whereIn('name', 'user')->first())
        {
            return true;
        }
        return false;
    }
}
