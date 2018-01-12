<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function createLesson($data)
    {
        return $this->lessons()->create($data);
    }

    /**
     * A user has many channels
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany

     */
    public function channels()
    {
        return $this->hasMany(Channel::class);
    }

    /**
     * User can create a new channel
     *
     * @param array $data
     * @return Model
     */
    public function makeChannel($data)
    {
        return $this->channels()->create($data);
    }
}
