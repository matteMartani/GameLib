<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareHouse extends Model
{
    use HasFactory;

    protected $table = 'software_house';
    protected $primaryKey = 'software_house_id';
    protected $fillable = ['user_id', 'nome'];

    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(GameUser::class, 'user_id');
    }

    public function games()
    {
        return $this->hasMany(Gioco::class, 'software_house_id');
    }
}

