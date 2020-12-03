@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">District Manager</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Managers

            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addDistrictManager">Add</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>District</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($managers as $manager)
                            <tr>
                                <td>{{ $manager->district->name }}</td>
                                <td>{{ $manager->user->name }}</td>
                                <td>{{ $manager->user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form action="/add-district-manager" method="post">
    @csrf
  <!-- The Modal -->
  <div class="modal" id="addDistrictManager">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add District Manager</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
                <select name="district_id" id="district" class="form-control" required>
                    <option value="">--District--</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success">Add</button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>
</form>
@endsection