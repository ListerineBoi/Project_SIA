<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dt_jual extends Model
{
    protected $fillable = [
        'tgl', 'jns_pjln', 'desc', 'btsbayar', 'jumlah' ,'cust', 'perc','hari',
    ];
    protected $table="dt_jual";
    protected $dates = [
        'tgl',
    ];
}
