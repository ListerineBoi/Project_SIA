<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurnal extends Model
{
    protected $fillable = [
        'tgl', 'no_bukti', 'ket', 'ref', 'debit' , 'kredit' , 'id_data',
    ];
    protected $table="jurnal";
}
