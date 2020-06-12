<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posting;
use App\jurnal;

class postingController extends Controller
{
    
    public function posting(Type $var = null)
    {
        $kas=posting::where('ket','=','Kas')->orderBy('tgl', 'asc')->get();
        $penj=posting::where('ket','=','Penjualan')->orderBy('tgl', 'asc')->get();
        $piut=posting::where('ket','=','Piutang')->orderBy('tgl', 'asc')->get();
        return view('posting',compact('kas','penj','piut'));
    }
    public function proses()
    {
        $saldo=0;
        $saldo1=0;
        $saldo2=0;
        $jur=jurnal::all();
        foreach($jur as $row)
        {
            switch ($row['ket']) 
            {
                case 'Kas':
                    $saldo += $row['debit']-$row['kredit'];
                    $kas= new posting([
                        'tgl' => $row['tgl'],
                        'id_datajurnal' => $row['id'],
                        'ket' => 'Kas',
                        'debit' =>  $row['debit'],
                        'kredit' =>  $row['kredit'],
                        'saldo' =>  $saldo
                    ]);
                    $kas->save();
                break;
                case 'Penjualan':
                    $saldo1 += $row['debit']-$row['kredit'];
                    $penj= new posting([
                        'tgl' => $row['tgl'],
                        'id_datajurnal' => $row['id'],
                        'ket' => 'Penjualan',
                        'debit' =>  $row['debit'],
                        'kredit' =>  $row['kredit'],
                        'saldo' =>  $saldo1
                    ]);
                    $penj->save();
                break;
                default:
                $saldo2 += $row['debit']-$row['kredit'];
                $piut= new posting([
                    'tgl' => $row['tgl'],
                    'id_datajurnal' => $row['id'],
                    'ket' => 'Piutang',
                    'debit' =>  $row['debit'],
                    'kredit' =>  $row['kredit'],
                    'saldo' =>  $saldo2
                ]);
                $piut->save();
            } 
        }
        return redirect()->route('posting');
    }
}
