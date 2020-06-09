<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dt_jual extends Model
{
    protected $fillable = [
        'tgl', 'jns_pjln', 'desc', 'btsbayar', 'jumlah' ,
    ];
    protected $table="dt_jual";
}
