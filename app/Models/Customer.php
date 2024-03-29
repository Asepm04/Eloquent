<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Wallet;

class Customer extends Model
{
    protected $table = "customers";
    protected $primarykey = 'id';
    protected $keytype = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function wallet(): HasOne 
    {
        return $this->hasOne(Wallet::class, 'customer_id','id');
    }
}
