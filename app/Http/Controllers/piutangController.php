<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dt_jual;
use App\piutang;
class piutangController extends Controller
{
    public function index()
    {
        $custo=piutang::all();
        echo $custo;
    }
    public function piutang()
    {
        $cus=dt_jual::Where('jns_pjln', 'Kredit')->distinct()
        ->get();
        foreach($cus as $row)
        {
            $inp= new piutang([
                'cust' => $row['cust'],
                'total' =>  $row['jumlah']
            ]);
            $inp->save();
            
            
        }
        $cust=dt_jual::Where('jns_pjln', 'Penagihan')->distinct()
        ->get();  
        foreach($cust as $row)
        {
            $kre=dt_jual::where([
                ['cust', '=', $row['cust']],
                ['jns_pjln', '=', 'Kredit'],
            ])->value('tgl');
            
                    $diff_in_days = $kre->diffInDays($row['tgl']);
                    switch (true) 
                    {
                        case $diff_in_days <=30:
                            
                            piutang::where('cust', $row['cust'])->update(['<30' => $row['jumlah']]);
                        break;
                        case $diff_in_days <=60 :
                            
                            piutang::where('cust', $row['cust'])->update(['31-60' => $row['jumlah']]);
                            
                        break;
                        case $diff_in_days <=90 :
                            piutang::where('cust', $row['cust'])->update(['61-90' => $row['jumlah']]);
                        break;
                        default:
                        piutang::where('cust', $row['cust'])->update(['>90' => $row['jumlah']]);
                    }
                
        }
        $custo=piutang::all();
        foreach($custo as $row)
        {
            $nyd=$row['total']-$row['<30']-$row['31-60']-$row['61-90']-$row['>90'];
            piutang::where('cust', $row['cust'])->update(['nyd' => $nyd]);
        }
        
    }
}
