<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\message;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Username',
        'Email',
        'Phone',
        'Status',
        'Password',
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

    public function messages()
    {
        return $this->hasMany(message::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(message::class, 'ReceiverID');
    }
    public function favorites()
    {
        return $this->hasMany(message::class, 'UserID');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class, 'UserID');
    }

    public function conversations1()
    {
        return $this->hasMany(Conversation::class, 'user_1');
    }

    public function conversations2()
    {
        return $this->hasMany(Conversation::class, 'user_2');
    }
   


}
