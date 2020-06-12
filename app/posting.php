<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posting extends Model
{
    protected $fillable = [
        'tgl', 'ket', 'ref', 'debit' , 'kredit' ,'saldo', 'id_datajurnal',
    ];
    protected $table="posting";
}
