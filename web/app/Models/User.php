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
        'provider',
        'provider_id'
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

    public function rewards() {
        return $this->hasMany(QuestReward::class, 'user_id');
    }

    public function points() {
        $points = 0;
        foreach($this->rewards as $reward)
            $points += $reward->points;
        return $points;
    }

    public function shop() {
        return $this->hasOne(Shop::class, 'manager_id');
    }

    public function isManager() {
        if($this->shop_id)
            return $this->shop;
        else
            return null;
    }
}
