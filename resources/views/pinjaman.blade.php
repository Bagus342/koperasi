@extends('templates.template')
@section('content')
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-sm-4">
                  <h1 class="h3 mb-2 mt-4 text-gray-800">Pinjaman</h1>
                </div>
                <div class="content-header">
                  <div id="flash-data-success" data-flash-success="{{ Session('success') }}"></div>
                  <div id="flash-data-error" data-flash-error="{{ session('error') }}"></div>
                </div>
              </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">                   
                <div class="card-body">
                    <a href="#addData" type="button" data-toggle="modal" data-target="#addData" class="btn btn-primary mb-2" style="margin-left: 50rem !important;"><i class="fa fa-plus mr-2"></i>Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Invoice</th>
                                    <th>Nama Anggota</th>
                                    <th>Total Pinjaman</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Data Anggota</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Anggota</label>
                                    <select name="anggota" class="form-control" required>
                                        <option value="" disabled selected>Pilih Anggota...</option>
                                        @foreach ($anggota as $item)
                                            <option value="{{$item->id}}">{{$item->nik}} - {{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bunga</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="bunga" id="exampleInputPassword1" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Total</label>
                                    <input type="text" class="form-control" name="total" id="exampleInputPassword1" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Durasi Angsuran</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="angsuran" id="exampleInputPassword1" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Bulan</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Jaminan</label>
                                    <select name="jaminan" class="form-control" required>
                                        <option value="" selected disabled>Pilih Jaminan...</option>
                                        <option value="BPKB">BPKB</option>
                                        <option value="Akta Rumah">Akta Rumah</option>
                                        <option value="Kendaraan">Kendaraan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Dokumen Jaminan</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="dokumen" id="exampleInputPassword1" required>
                                        <label for="exampleInputPassword1" class="custom-file-label">Choose File...</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                  </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->    
@endsection
