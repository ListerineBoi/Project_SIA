@extends('nav.navbar')

@section('content')
<div class="container">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger"> 
                            <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                            </ul>
                            </div>
                    @endif
                    @if(\Session::has('Forbidden'))
                        <div class="alert alert-danger">
                            <p>{{\Session::get('Forbidden')}}</p>
                        </div>
                    @endif
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"> <strong> Tabel Record Penjualan </strong> </div>
            <div class="card-body">
                            <table class="table table-hover" align="center">
                            <tr>
                                <th> Tanggal </th>
                                <th> Bukti </th>
                                <th> Keterangan </th>
                                <th> Ref </th>
                                <th> Debit </th>
                                <th> Kredit </th>

                            <tr>
                            @foreach($jur as $row)
                                <tr>
                                    <td> {{$row['tgl']}} </td>
                                    <td> - </td>
                                    <td> {{$row['ket']}} </td>
                                    <td> - </td>
                                    <td> {{$row['debit']}} </td>
                                    <td> {{$row['kredit']}} </td>
                                </tr>
                            @endforeach
                                <tr>
                                <td>  </td>
                                <td>  </td>
                                <td> TOTAL </td>
                                <td> : </td>
                                <td> {{DB::table("jurnal")->get()->sum("debit")}} </td>
                                <td> {{DB::table("jurnal")->get()->sum("kredit")}} </td>    
                                    
                                </tr>
                            </table>
            </div>
        </div>
        </div>

      </div>
  </div>

  
  @endsection