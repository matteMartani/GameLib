<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gioco extends Model
{
    use HasFactory;

    protected $table = 'gioco';
    protected $primaryKey = 'game_id';
    protected $fillable = [
        'titolo',
        'anno',
        'software_house_id',
        'cover',
        'Playtime',
        'Score',
        'user_id',
    ];

    public $timestamps = false;


    public function software_house()
    {
        return $this->belongsTo(SoftwareHouse::class, 'software_house_id');
    }

    public function user()
    {
        return $this->belongsTo(GameUser::class, 'user_id');
    }

}
