@extends('layouts.layout')

@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home </a></li>
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body table-responsive">
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success btn-sm float-right" href="javascript:void(0)" id="createNewUser" style="margin-bottom: 15px;">
                            <i class="fas fa-plus"></i>&nbsp;&nbsp;
                            <b>New User</b>
                        </a>
                    </div>
                </div>
                <table class="table table-bordered table-striped data-table">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Position</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="userModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHeading"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="userForm" name="userForm" method="POST" class="form-horizontal login-card-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name" class="col-sm-12 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="" maxlength="50" required="">
                                <input type="hidden" id="email_old" name="email_old" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-12 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-12 control-label">Password </label>
                            <div class="col-sm-12 input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" required="">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-eye viewPassword" style="display:none"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-12 control-label">Confirmation Password</label>
                            <div class="col-sm-12 input-group">
                                <input type="password" class="form-control" id="c_password" name="c_password" placeholder="Konfirmasi Password" value="" maxlength="50" required="">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-eye viewConfirmPassword" style="display:none"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value=""></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="positionModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPositionHeading"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="positionForm" name="positionForm" class="form-horizontal login-card-body" method="POST">
                        <input type="hidden" name="user_id" id="user_id">
                        <input type="hidden" name="type" id="type">
                        <div class="form-group">
                            <label for="name" class="col-sm-12 control-label">Position</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="position" name="position" placeholder="Position" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-12 control-label">Status</label>
                            <div class="col-sm-12">
                                <select name="status" class="form-control" id="status" required>
                                    <option value="">-- Choose Status --</option>
                                    <option value="active">active</option>
                                    <option value="inactive">inactive</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-offset-2 col-sm-12">
                            <button type="submit" class="btn btn-primary" id="positionBtn"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection