<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';
    protected $primaryKey = 'post_id';
    protected $fillable = [
        'disc_id',
        'user_id',
        'content'
    ];

    public $timestamps = false;


    public function discussion()
    {
        return $this->belongsTo(Discuss::class, 'disc_id');
    }

    public function user()
    {
        return $this->belongsTo(GameUser::class, 'user_id');
    }
}
