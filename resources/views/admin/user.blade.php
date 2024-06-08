@extends('templates.admin')
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
                            <h1 class="h3 mb-2 mt-4 text-gray-800">User</h1>
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
                                                <th>No</th>
                                                <th>Nama User</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Role</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            @if(!$data)
                                              <p>Data Kosong</p>
                                            @else
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->username}}</td>
                                                    <td>{{$item->nonhash}}</td>
                                                    <td>{{$item->role}}</td>
                                                    <td>
                                                        <a href="" data-toggle="modal" data-target="#updateData{{$item->id}}"><i class="fa fa-pen text-warning"></i></a>
                                                        <a href="" data-toggle="modal" data-target="#deleteData{{$item->id}}"><i class="fa fa-trash text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="updateData{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add Data User</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <form action="/admin/user/{{$item->id}}" method="post">
                                                      <div class="modal-body">
                                                          @csrf
                                                          @method('PUT')
                                                          <div class="form-group">
                                                              <label for="exampleInputEmail1">Name</label>
                                                              <input type="text" class="form-control" name="name" value="{{$item->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                            </div>
                                                          <div class="form-group">
                                                              <label for="exampleInputEmail1">Username</label>
                                                              <input type="text" class="form-control" name="username" value="{{$item->username}}" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="exampleInputPassword1">Password</label>
                                                              <input type="password" class="form-control" name="password" value="{{$item->nonhash}}" id="exampleInputPassword1" required>
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="exampleFormControlSelect1">Role</label>
                                                              <select class="form-control" name="role" id="exampleFormControlSelect1" required>
                                                                <option value="" disabled selected>Pilih Role...</option>
                                                                <option value="admin" {{$item->role === 'admin' ? 'selected' : ''}}>Admin</option>
                                                                <option value="karyawan" {{$item->role === 'karyawan' ? 'selected' : ''}}>Karyawan</option>
                                                                <option value="manager" {{$item->role === 'manager' ? 'selected' : ''}}>Manager</option>
                                                              </select>
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
                                                          <form action="/admin/user/{{ $item->id }}" method="GET">
                                                              <div class="modal-header">
                                                                  <h4 class="modal-title">Delete User</h4>
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
    
                    </div>
                    <!-- /.container-fluid -->
    
                </div>
                <!-- End of Main Content -->
                <div class="modal fade" id="addData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Data User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="" method="post">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                              </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Role</label>
                                <select class="form-control" name="role" id="exampleFormControlSelect1" required>
                                  <option value="" disabled selected>Pilih Role...</option>
                                  <option value="admin">Admin</option>
                                  <option value="karyawan">Karyawan</option>
                                  <option value="manager">Manager</option>
                                </select>
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
@endsection