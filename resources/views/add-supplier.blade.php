@extends('layouts.master')
@section('content')
<h1 class="mt-4">
    {{-- <a href="{{ url()->previous() }}" class="link">
        <i class="fas fa-chevron-left"></i>
    </a> --}}
</h1>
<div class="container-fluid">
    <div class="col-md-4">
        <form action="/add-supplier" method="post">
            @csrf
            <div class="card mb-4">
                <div class="card-header">
                    <h4>
                        <a href="/supplier" class="link">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        Add Supplier
                    </h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address_line_1">Address Line 1</label>
                        <input type="text" name="address_line_1" id="address_line_1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address_line_2">Address Line 2</label>
                        <input type="text" name="address_line_2" id="address_line_2" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" pattern="\d*" minlength="6" maxlength="6" name="postal_code" id="postal_code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Contact No.</label>
                        <input type="text" pattern="\d*" minlength="10" maxlength="10" name="contact_no" id="contact_no" class="form-control" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
