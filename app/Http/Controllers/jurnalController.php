<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dt_jual;
use App\jurnal;
class jurnalController extends Controller
{
    public function jurnal()
    {
        // $arr = array(1, 2, 3, 4);
        // $tot =0;
        // foreach ($arr as $value) {
        //     $tot += $value;
        //     echo $value.'total='.$tot.'<br>';
        // }

        $jur=jurnal::orderBy('tgl', 'asc')->get();
        return view('jurnal',compact('jur'));
    }
    public function proses()
    {
        $dtjl=dt_jual::all();
        foreach($dtjl as $row)
        {
            switch ($row['jns_pjln']) 
            {
                case 'Cash':
                    $kas= new jurnal([
                        'tgl' => $row['tgl'],
                        'id_data' => $row['id'],
                        'ket' => 'Kas',
                        'debit' =>  $row['jumlah']
                    ]);
                    $kas->save();
                    $penj= new jurnal([
                        'tgl' => $row['tgl'],
                        'id_data' => $row['id'],
                        'ket' =>  'Penjualan',
                        'kredit' =>  $row['jumlah']
                    ]);
                    $penj->save();
                break;
                case 'Kredit':
                    $piutg= new jurnal([
                        'tgl' => $row['tgl'],
                        'id_data' => $row['id'],
                        'ket' =>  'Piutang',
                        'debit' =>  $row['jumlah']
                    ]);
                    $piutg->save();
                    $penj= new jurnal([
                        'tgl' => $row['tgl'],
                        'id_data' => $row['id'],
                        'ket' =>  'Penjualan',
                        'kredit' =>  $row['jumlah']
                    ]);
                    $penj->save();
                break;
                default:
                $kas= new jurnal([
                    'tgl' => $row['tgl'],
                    'id_data' => $row['id'],
                    'ket' => 'Kas',
                    'debit' =>  $row['jumlah']
                ]);
                $kas->save();
                $piutg= new jurnal([
                    'tgl' => $row['tgl'],
                    'id_data' => $row['id'],
                    'ket' =>  'Piutang',
                    'kredit' =>  $row['jumlah']
                ]);
                $piutg->save();
            } 
        }
        return redirect()->route('jurnal');
    }
}
