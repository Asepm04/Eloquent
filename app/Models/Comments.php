<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table        = 'comments';
    protected $primaryKey   = 'id';
    protected $keyType      = 'integer';
    public    $incrementing = true;
    public    $timestamps   = true;

    protected $attributes   = 
    [
        'title'   => 'default title',
        'comment' => 'default comment',
        'email'   => 'a@x.com'
    ];

    protected $fillable = 
    [
        'id',
        'title',
        'comment'
    ];
}
