@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">
        {{-- <a href="{{ url()->previous() }}" class="link">
            <i class="fas fa-chevron-left"></i>
        </a> --}}
    </h1>
    <div class="col-md-6 mx-auto">
        <div class="card mb-4">
            <form action="/update-material/{{ $material->id }}" method="post">
                @csrf
                <div class="card-header">
                    <h4>Edit Material</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control" required>
                                    <option value="">--Category--</option>
                                    @foreach ($categories as $category)
                                        <option {{ $category->id == $material->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }} ({{ $category->code }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Material Name</label>
                                <input type="text" name="material_name" id="name" class="form-control" required value="{{ $material->name }}">
                            </div>
                            <div class="form-group">
                                <label for="serial_number">Serial Number</label>
                                <input type="text" name="serial_number" id="serial_number" class="form-control" value="{{ $material->serial_number }}">
                            </div>
                            <div class="form-group">
                                <label for="manufacturer">Manufacturer</label>
                                <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="{{ $material->manufacturer }}">
                            </div>
                            <div class="form-group">
                                <label for="color">Color</label>
                                <input type="text" name="color" id="color" class="form-control" value="{{ $material->color }}">
                            </div>
                            <div class="form-group">
                                <label for="purchase_date">Purchase Date</label>
                                <input type="date" name="purchase_date" id="purchase_date" class="form-control" required value="{{ $material->purchase_date }}">
                            </div>
                            <div class="form-group">
                                <label for="purchase_price">Purchase Price</label>
                                <input type="number" name="purchase_price" id="purchase_price" class="form-control" min="10" required value="{{ $material->purchase_price }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="current_value">Current Value</label>
                                <input type="number" name="current_value" id="current_value" class="form-control" min="10" required value="{{ $material->current_value }}">
                            </div>
                            <div class="form-group">
                                <label for="issue_date">Issue Date</label>
                                <input type="date" name="issue_date" id="issue_date" class="form-control" required value="{{ $material->issue_date }}">
                            </div>
                            <div class="form-group">
                                <label for="total_expense">Total Expense</label>
                                <input type="number" name="total_expense" id="total_expense" class="form-control" min="10" required value="{{ $material->total_expense }}">
                            </div>
                            <div class="form-group">
                                <label for="last_deprication">Last Deprication</label>
                                <input type="date" name="last_deprication" id="last_deprication" class="form-control" required value="{{ $material->last_deprication }}">
                            </div>
                            <div class="form-group">
                                <label for="deprication_rate">Deprication Rate</label>
                                <input type="number" name="deprication_rate" id="deprication_rate" class="form-control" min="1" required value="{{ $material->deprication_rate }}">
                            </div>
                            <div class="form-group">
                                <label for="supplier_id">Supplier</label>
                                <select name="supplier_id" id="supplier_id" class="form-control" required>
                                    <option value="">--Supplier--</option>
                                    @foreach ($suppliers as $supplier)
                                        <option {{ $supplier->id == $material->supplier_id ? 'selected' : '' }} value="{{ $supplier->id }}">{{ $supplier->name }} ({{ $supplier->code }})</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="working_status">Working Status</label>
                                <select name="working_status" id="working_status" class="form-control" required>
                                    <option value="">--Status--</option>
                                    <option {{ $material->working_status == "Idle" ? 'selected' : '' }} value="Idle">Idle</option>
                                    <option {{ $material->working_status == "Working" ? 'selected' : '' }} value="Working">Working</option>
                                    <option {{ $material->working_status == "Reparing" ? 'selected' : '' }} value="Reparing">Reparing</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
