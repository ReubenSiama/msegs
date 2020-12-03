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
            <form action="/request-material" method="post">
                @csrf
                <div class="card-header">
                    <h4>Request Material</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="material">Material Name</label>
                        <select name="material" id="material" class="form-control" required>
                            <option value="">--Material--</option>
                            @foreach ($materials as $material)
                                <option value="{{ $material->id }}">{{ $material->name }} ({{ $material->material_code }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="district">District</label>
                        <select name="district" id="district" class="form-control" required>
                            <option value="">--District--</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" class="form-control" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
