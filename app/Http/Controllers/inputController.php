<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dt_jual;
class inputController extends Controller
{
    public function index()
    {
        $dtjl=dt_jual::orderBy('tgl', 'asc')->get();
        $dtjlkredit=dt_jual::where('jns_pjln','=','Kredit')->get();
       return view('input',compact('dtjl','dtjlkredit'));
        //return print_r($dtjlkredit);
        //return date("Y-m-d");
    }

    public function tambah(Request $request)
    {
        $this->validate($request, [
            'Tanggal' => 'required',
            'Jumlah' => 'required',
            'desc' => 'required'      
        ]);
        if($request->get('jenis')=="Cash" && $request->get('Batas') !="-")
        {
            return redirect()->route('input')->with('Forbidden','transakasi Cash tidak boleh ada batas bayar');
        }
        else
        {
        $dt_jual= new dt_jual([
            'tgl' => $request->get('Tanggal'),
            'jns_pjln' => $request->get('jenis'),
            'jumlah' => $request->get('Jumlah'),
            'btsbayar' => $request->get('Batas'),
            'desc' => $request->get('desc')
        ]);
        $dt_jual->save();
        return redirect()->route('input');
        }
    }

    public function tambahP(Request $request)
    {
        $this->validate($request, [
            'Tanggal' => 'required',
            'Jumlah' => 'required',
            'desc' => 'required'      
        ]);

        $dt_jual= new dt_jual([
            'tgl' => $request->get('Tanggal'),
            'jns_pjln' => "pembayaran piutang : ".dt_jual::where('id','=', $request->get('jenis'))->value('tgl'),
            'jumlah' => $request->get('Jumlah'),
            'btsbayar' => dt_jual::where('id','=', $request->get('jenis'))->value('btsbayar'),
            'desc' => $request->get('desc')
        ]);
        $dt_jual->save();
        return redirect()->route('input');
    }
}
