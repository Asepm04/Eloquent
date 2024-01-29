<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer1s;
use App\Models\Wallet1s;

class JoinSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cus = new Customer1s();
        $cus->id = 'gita';
        $cus->name = 'gitar';
        $cus->save();

        $wal = new Wallet1s();
        $wal->name_id = 'gita';
        $wal->save();
    }
}
