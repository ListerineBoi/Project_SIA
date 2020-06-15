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
    // $tgl = dt_jual::latest()->value('tgl');
    // echo $tgl;
        
    }

    public function tambah(Request $request)
    {
        $this->validate($request, [
            'Tanggal' => 'required',
            'Jumlah' => 'required',
            'desc' => 'required'      
        ]);
        
        $tgl = dt_jual::latest()->value('tgl');
        if($tgl==null)
        {
            $diff_in_days=1;
        }
        else
        {
            $diff_in_days = $tgl->diffInDays($request->get('Tanggal'),false);
        }
        if($request->get('jenis')=="Cash" && ($request->get('perc') !=null || $request->get('hari') !=null))
        {
            return redirect()->route('input')->with('Forbidden','transakasi Cash tidak boleh ada batas bayar');
        }
        elseif($request->get('jenis')=="Kredit" && ($request->get('perc') ==null || $request->get('hari') ==null))
        {
            return redirect()->route('input')->with('Forbidden','transakasi Kredit harus ada batas bayar');
        }
        elseif($diff_in_days<0)
        {
            return redirect()->route('input')->with('Forbidden','Tanggal tidak bisa sebelum data terbaru');
        }
        else
        {
        $dt_jual= new dt_jual([
            'tgl' => $request->get('Tanggal'),
            'cust' => $request->get('cust'),
            'jns_pjln' => $request->get('jenis'),
            'jumlah' => $request->get('Jumlah'),
            'perc' => $request->get('perc'),
            'hari' => $request->get('hari'),
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
            'jenis'  => 'required',  
        ]);
        $tgl = dt_jual::latest()->value('tgl');
        if($tgl==null)
        {
            $diff_in_days=1;
        }
        else
        {
            $diff_in_days = $tgl->diffInDays($request->get('Tanggal'),false);
        }

        if($diff_in_days<0)
        {
            return redirect()->route('input')->with('Forbidden','Tanggal tidak bisa sebelum data terbaru');
        }
        elseif(dt_jual::where('id','=', $request->get('jenis'))->value('jumlah')<$request->get('Jumlah'))
        {
            return redirect()->route('input')->with('Forbidden','penagihan lebih besar dari piutang!');
        }
        else
        {
        $dt_jual= new dt_jual([
            'tgl' => $request->get('Tanggal'),
            'cust' => dt_jual::where('id','=', $request->get('jenis'))->value('cust'),
            'desc' => "pembayaran piutang : ".dt_jual::where('id','=', $request->get('jenis'))->value('tgl'),
            'jumlah' => $request->get('Jumlah'),
            'perc' => dt_jual::where('id','=', $request->get('jenis'))->value('perc'),
            'hari' => dt_jual::where('id','=', $request->get('jenis'))->value('hari'),
            'jns_pjln' => 'Penagihan'
        ]);
        $dt_jual->save();
        return redirect()->route('input');
        }
    }
}
