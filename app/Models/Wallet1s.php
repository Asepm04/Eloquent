<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Customer1s;

class Wallet1s extends Model
{
    protected $table = 'wallet1s';
    protected $primarykey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps  = false;

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer1s::class, 'name_id','id');
    }
}
