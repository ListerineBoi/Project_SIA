@extends('nav.navbar')

@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"> <strong> Input Penjualan </strong> </div>
                <div class="card-body">
                @if(count($errors) > 0)
                        <div class="alert alert-danger"> 
                            <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                            </ul>
                            </div>
                    @endif
                <form method="post" action="{{route('tambah')}}">
                @csrf
                    <label> Tanggal </label>
                    <div class="form-group">
                        <input type="date" name="Tanggal" class="form-control" value=<?php echo date("Y-m-d") ?>> 
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
                      <select name ="Batas" class="custom-select">
                      <option value="-">-</option>
                      <option value="2/10">2/10</option>
                      <option value="5/15">5/15</option>
                      <option value="n/30">n/30</option>
                      </select>
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
        <div class="col-md-6">
            <div class="card">
                  
                            <table class="table table-hover" align="center">
                            <tr>
                                <th> NO </th>
                                <th> ID </th>
                                <th> Tanggal </th>
                                <th> Batas Bayar </th>
                                <th> Nilai (RP) </th>
                                <th> Jenis Penjualan </th>
                                <th> Deskripsi </th>
                            <tr>
                            @foreach($dtjl as $row)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <td> {{$row['id']}} </td>
                                    <td> {{$row['tgl']}} </td>
                                    <td> {{$row['btsbayar']}} </td>
                                    <td> {{$row['jumlah']}} </td>
                                    <td> {{$row['jns_pjln']}} </td>
                                    <td> {{$row['desc']}} </td>
                                </tr>
                            @endforeach
                            </table>
                            <button type="submit" class="btn btn-primary">Proses Data</button>
            </div>
        </div>


      </div>
  </div>
  <br>
  <div class="container">
  <div class="row justify-content-left">
  <div class="col-md-6">
            <div class="card">
                <div class="card-header"> <strong> Input Bayar </strong> </div>
                <div class="card-body">
                @if(count($errors) > 0)
                        <div class="alert alert-danger"> 
                            <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                            </ul>
                            </div>
                    @endif
                <form method="post" action="{{route('tambah')}}">
                @csrf
                    <label> Tanggal </label>
                    <div class="form-group">
                        <input type="date" name="Tanggal" class="form-control" value=<?php echo date("Y-m-d") ?>> 
                    </div>
                    <div class="form-group">
                      <label> ID kredit yang akan dilunasi </label>
                      <select name ="jenis" class="custom-select">
                      @foreach($dtjlkredit as $row1)
                      <option value="Pelunasan piutang : {{$row1['id']}}">{{$row1['id']}}</option>
                      @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                        <label> Jumlah </label>
                        <input type="number" class="form-control" name="Jumlah">
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
        </div>
    </div>
  @endsection