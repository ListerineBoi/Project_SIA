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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"> <strong> Input Record Penjualan </strong> </div>
                <div class="card-body">
               
                <form method="post" action="{{route('tambah')}}">
                @csrf
                    <label> Tanggal </label>
                    <div class="form-group">
                        <input type="date" name="Tanggal" class="form-control" value=<?php echo date("Y-m-d") ?>> 
                    </div>

                    <div class="form-group">
                    <label> Customer </label>
                    <input type="text" class="form-control" name="cust">
                    </div>

                    <div class="form-group">
                    <label> Jumlah </label>
                    <input type="number" class="form-control" name="Jumlah">
                    </div>

                    <div class="form-group">
                      <label> Jenis Penjualan </label>
                      <select name ="jenis" class="custom-select">
                      <option value="Cash">Cash</option>
                      <option value="Kredit">Kredit</option>
                      </select>
                    </div>

                    <div class="form-group">
                    <label> Batas Pembayaran </label>
                        <div class="row">
                            <div class="col">
                                <input type="number" class="form-control" name="perc" placeholder="ex:2">
                            </div>
                            <label> / </label>
                            <div class="col">
                                <input type="number" class="form-control" name="hari" placeholder="ex:20">
                            </div>
                        </div>
                    </div>

                      <div class="form-group">
                          <label> Deskripsi </label>
                          <textarea class="form-control" name="desc" rows="3" placeholder="ex.Python,PHP,dll"></textarea>
                      </div>
                      
                      
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"> <strong> Tabel Record Penjualan </strong> </div>
            <div class="card-body">
                            <table class="table table-hover" align="center">
                            <tr>
                                <th> NO </th>
                                <th> Tanggal </th>
                                <th> Cust </th>
                                <th> Batas Bayar </th>
                                <th> Nilai (RP) </th>
                                <th> Jenis Penjualan </th>
                                <th> Deskripsi </th>
                            <tr>
                            @foreach($dtjl as $row)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <td> {{$row['tgl']}} </td>
                                    <td> {{$row['cust']}} </td>
                                    <td> {{$row['perc']}}/{{$row['hari']}} </td>
                                    <td> {{$row['jumlah']}} </td>
                                    <td> {{$row['jns_pjln']}} </td>
                                    <td> {{$row['desc']}} </td>
                                </tr>
                            @endforeach
                            </table>
                            <button class="btn btn-success"> <a style="color:white;text-decoration: none;" href="{{ route('ProsesJ') }}"> Proses data </a> </button>
            </div>
        </div>
      </div>
  </div>
  <br>
  <div class="row justify-content-left">
  <div class="col-md-4">
            <div class="card">
                <div class="card-header"> <strong> Input Bayar </strong> </div>
                <div class="card-body">
                
                <form method="post" action="{{route('tambahP')}}">
                @csrf
                    <label> Tanggal </label>
                    <div class="form-group">
                        <input type="date" name="Tanggal" class="form-control" value=<?php echo date("Y-m-d") ?>> 
                    </div>
                    <div class="form-group">
                      <label> kredit yang akan dilunasi </label>
                      <select name ="jenis" class="custom-select">
                      @foreach($dtjlkredit as $row1)
                      <option value="{{$row1['id']}}">{{$row1['tgl']}}</option>
                      @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                        <label> Jumlah </label>
                        <input type="number" class="form-control" name="Jumlah">
                    </div>
                                            
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
        
    </div>
  @endsection