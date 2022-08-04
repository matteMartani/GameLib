<?php

namespace Database\Seeders;

use App\Models\DataLayer;
use App\Models\GameUser;
use App\Models\SoftwareHouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use database\factories\SoftwareHouseFactory;

class db_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GameUser::create([
            'username' => 'matteo',
            'mail' => 'matteo.martani@gmail.com',
            'password' => md5('martani'),
        ]);

        $dl = new DataLayer();
        $user = $dl->list_users()->first();

        SoftwareHouse::factory()->count(10)->create(['user_id' => $user->user_id]);


    }
}
