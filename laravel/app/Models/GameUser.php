<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameUser extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'username',
        'mail',
        'password',
    ];

    public $timestamps = false;

    public function software_houses()
    {
        return $this->hasMany(SoftwareHouse::class, 'user_id');
    }

    public function games()
    {
        return $this->hasMany(Gioco::class, 'user_id');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'user_id');
    }

    public function discussions(){
        return $this->hasMany(Discuss::class, 'user_id');
    }
}
