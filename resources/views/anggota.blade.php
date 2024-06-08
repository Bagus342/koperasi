@extends('templates.template')
@section('content')
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
    
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
    
                        <!-- Page Heading -->
                        <div class="row">
                            <div class="col-sm-4">
                              <h1 class="h3 mb-2 mt-4 text-gray-800">Anggota</h1>
                            </div>
                            <div class="content-header">
                              <div id="flash-data-success" data-flash-success="{{ Session('success') }}"></div>
                              <div id="flash-data-error" data-flash-error="{{ Session('error') }}"></div>
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
                                                <th>No</th>
                                                <th>Nama Anggota</th>
                                                <th>Nik</th>
                                                <th>No Handphone</th>
                                                <th>Alamat</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            @if(count($data) == 0)
                                            <tr>
                                                <td colspan="6" class="text-center">Data Kosong</td>
                                            </tr>
                                            @else
                                                @foreach ($data as $item)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->nik}}</td>
                                                    <td>{{$item->no_hp}}</td>
                                                    <td>{{$item->alamat}}</td>
                                                    <td>
                                                        <a href="" data-toggle="modal" data-target="#updateData{{$item->id}}"><i class="fa fa-pen text-warning"></i></a>
                                                        <a href="" data-toggle="modal" data-target="#deleteData{{$item->id}}"><i class="fa fa-trash text-danger"></i></a>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="updateData{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Update Data Anggota</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="/anggota/{{$item->id}}" method="post">
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Nama Anggota</label>
                                                                        <input type="text" class="form-control" value="{{$item->name}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">NIK</label>
                                                                        <input type="text" class="form-control" value="{{$item->nik}}" name="nik" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">No Handphone</label>
                                                                        <input type="text" class="form-control" value="{{$item->no_hp}}" name="no_hp" id="exampleInputPassword1" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Alamat</label>
                                                                        <textarea name="alamat" class="form-control" required>{{$item->alamat}}</textarea>
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
  
                                                  <div id="deleteData{{ $item->id }}" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="/anggota/{{ $item->id }}" method="GET">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete Anggota</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>yakin ingin menghapus data?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @endif
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
                                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">NIK</label>
                                                <input type="text" class="form-control" name="nik" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">No Handphone</label>
                                                <input type="text" class="form-control" name="no_hp" id="exampleInputPassword1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Alamat</label>
                                                <textarea name="alamat" class="form-control" required></textarea>
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