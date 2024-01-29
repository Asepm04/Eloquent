<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Customer;
use App\Models\Wallet;
use App\Models\Customer1s;
use App\Models\Wallet1s;


use Database\Seeders\JoinSeed;

class JOINTest extends TestCase
{
    // public function testOneTone()
    // {
    //     // $customer = new Customer();
    //     // $customer->id  = 'eko1';
    //     // $customer->nama = 'eko1';
    //     // $customer->email = 'eko1@com';
    //     // $customer->save();

    //     // $Walet = new Wallet();
    //     // $Walet->customer_id = 'eko';
    //     // $Walet->amount = 7000;
    //     // $Walet->save();

    //     // self::assertNotNull($walet);

    // }

    public function testJoin()
    {
        $customer = Customer::find('eko');
        self::assertNotNull($customer);

        $wallet = $customer->wallet;
        self::assertNotNull($wallet);
        self::assertEquals(7000,$wallet->amount);
    }

    public function testLatihan()
    {
        $cus1 = Customer1s::find('gita');
        self::assertNotNull($cus1);

        $Wal1 = $cus1->wallet;
        self::assertNotNull($Wal1);


    }
}
