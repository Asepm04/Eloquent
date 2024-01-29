<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Voucher;
use Illuminate\Support\Facades\Log;

class Vouchertest extends TestCase
{
    public function testUuid()
    {
        $vocer = new Voucher();
        $vocer->voucher = 'vocer';
        $vocer->kode = '4242453466';
        $result = $vocer->save();

        $vocer->each(function($sql)
        {
            log::info(json_encode($sql->id));
        });

        self::assertTrue($result);
    }

    public function testUniqueIds()
    {
        $vocer = new Voucher();
        $vocer->voucher = 'vocer';
        $vocer->kode = '4242453466';
        $result = $vocer->save();

        $vocer1  = new Voucher();
        $vocer1->voucher = 'vocer3';
        $result = $vocer1->save();

        $vocer->each(function($sql)
        {
            log::info(json_encode($sql));
        });

        self::assertTrue($result);
    }

    public function testSoftDeletes()
    {
        $this->testUniqueIds();

        $voucher = Voucher::query()->where('voucher','=','vocer')->first();
        $voucher->delete();

        $voucher = Voucher::query()->where('voucher','=','vocer')->first();
        self::assertNull($voucher);
    }

    public function testSoftDeleteTrashed()
    {
        $this->testUniqueIds();

        $voucher = Voucher::query()->where('voucher','=','vocer')->first();
        $voucher->delete();

        $voucher = Voucher::withTrashed()->where('voucher','=','vocer')->first();
        $voucher->each(function($sql)
            {
                log::info(json_encode($sql));
            });
        self::assertNotNull($voucher);
    }
}
