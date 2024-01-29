<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasUuids,SoftDeletes;

    protected $table = "vouchers";
    protected $primarykey = 'id';
    protected $keytype = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function uniqueIds():array
    {
        return [$this->primarykey, "kode"];
    }

    protected $fillable  = ['voucher','kode'];
}
