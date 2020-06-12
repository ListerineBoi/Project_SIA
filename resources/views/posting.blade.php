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
            <div class="card-header"> <strong> Kas </strong> </div>
                            <table class="table table-hover" align="center">
                            <tr>
                                <th> Tanggal </th>
                                <th> Keterangan </th>
                                <th> Ref </th>
                                <th> Debit </th>
                                <th> Kredit </th>
                                <th> Saldo </th>

                            <tr>
                            @foreach($kas as $row)
                                <tr>
                                    <td> {{$row['tgl']}} </td>
                                    <td> {{$row['ket']}} </td>
                                    <td> - </td>
                                    <td> {{$row['debit']}} </td>
                                    <td> {{$row['kredit']}} </td>
                                    <td> {{$row['saldo']}} </td>
                                </tr>
                            @endforeach
                            </table>
            </div>
        </div>


      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"> <strong> Penjualan </strong> </div>
                            <table class="table table-hover" align="center">
                            <tr>
                                <th> Tanggal </th>
                                <th> Keterangan </th>
                                <th> Ref </th>
                                <th> Debit </th>
                                <th> Kredit </th>
                                <th> Saldo </th>

                            <tr>
                            @foreach($penj as $row)
                                <tr>
                                    <td> {{$row['tgl']}} </td>
                                    <td> {{$row['ket']}} </td>
                                    <td> - </td>
                                    <td> {{$row['debit']}} </td>
                                    <td> {{$row['kredit']}} </td>
                                    <td> {{$row['saldo']}} </td>
                                </tr>
                            @endforeach
                            </table>
            </div>
        </div>


      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"> <strong> Piutang </strong> </div>
                            <table class="table table-hover" align="center">
                            <tr>
                                <th> Tanggal </th>
                                <th> Keterangan </th>
                                <th> Ref </th>
                                <th> Debit </th>
                                <th> Kredit </th>
                                <th> Saldo </th>

                            <tr>
                            @foreach($piut as $row)
                                <tr>
                                    <td> {{$row['tgl']}} </td>
                                    <td> {{$row['ket']}} </td>
                                    <td> - </td>
                                    <td> {{$row['debit']}} </td>
                                    <td> {{$row['kredit']}} </td>
                                    <td> {{$row['saldo']}} </td>
                                </tr>
                            @endforeach
                            </table>
            </div>
        </div>


      </div>
  </div>

  
  @endsection