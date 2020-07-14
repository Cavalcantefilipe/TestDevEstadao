<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $table = 'carro';
    protected $primaryKey = 'idCarro';


    protected $fillable = [
        'marca',
        'modelo',
        'ano'
    ];

    public $timestamps = false;


    protected $hidden = [];


    protected $casts = [

    ];
}