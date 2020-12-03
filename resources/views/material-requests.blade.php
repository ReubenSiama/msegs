@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Material Requests</h1>
    <div class="card mb-4">
        <div class="card-header">
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>District</th>
                            <th>Manager Name</th>
                            <th>Location</th>
                            <th>Requested Material</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materialRequests as $request)
                            <tr>
                                <td>{{ $request->districtManager->district->name }}</td>
                                <td>{{ $request->districtManager->user->name }}</td>
                                <td>{{ $request->location }}</td>
                                <td>
                                    @if ($request->materialInfo()->exists())
                                        {{ $request->materialInfo->name }} ({{ $request->materialInfo->material_code }})
                                    @else
                                        <i>Requested material no loger exists</i>
                                    @endif
                                </td>
                                <td>
                                    @if ($request->materialInfo()->exists())
                                        {{ $request->materialInfo->category->name }}
                                    @endif
                                </td>
                                <td>
                                    {{ $request->status }}
                                    @if ($request->allocated_material_id != null)
                                        <br>
                                        and Allocated {{ $request->materialAllocatedInfo->name }} ({{ $request->materialAllocatedInfo->material_code }})
                                    @endif
                                </td>
                                <td>
                                    <a href="/material-requests/{{ $request->id }}" class="btn btn-success btn-sm">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection