<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class piutang extends Model
{
    protected $fillable = [
        'id_data','total', 'nyd', '<30', '31-60', '61-90' ,'cust','>90',
    ];
    protected $table="piutang";
}
