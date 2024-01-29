<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Wallet1s;

class Customer1s extends Model
{
    protected $table = 'customer1s';
    protected $primarykey = 'id';
    protected $keytype = 'string';
    public $incrementing = false;
    public $timestamps  = false;

    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet1s::class, 'name_id','id');
    }
}
