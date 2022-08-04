<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discuss extends Model
{
    use HasFactory;

    protected $table = 'discuss';
    protected $primaryKey = 'disc_id';
    protected $fillable = [
        'user_id',
        'titolo',
        'topic'
    ];

    public $timestamps = false;


    public function posts()
    {
        return $this->hasMany(Post::class, 'disc_id');
    }

    public function user()
    {
        return $this->belongsTo(GameUser::class, 'user_id');
    }
}
