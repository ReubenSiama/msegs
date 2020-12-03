@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Requested Material</h1>
    <div class="card mb-4">
        <div class="card-header">
            <h3>{{ $requested->districtManager->user->name }} <small>From: {{ $requested->districtManager->district->name }}</small></h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Requested Category</th>
                        <td>{{ $requested->materialInfo->category->name }}</td>
                        <th>Requested For</th>
                        <td>{{ $requested->materialInfo->name }}</td>
                        <th>Requested On</th>
                        <td>{{ date('F d, Y', strtotime($requested->created_at)) }}</td>
                    </tr>
                    <tr>
                        <th>Requested For</th>
                        <td>{{ $requested->location }}</td>
                        <th>Status</th>
                        <td>{{ $requested->status }}</td>
                        <th>Requested Material Status</th>
                        <td>{{ $requested->materialInfo->working_status }}</td>
                    </tr>
                </table>
                <div class="text-center">
                    @if ($requested->materialInfo->working_status == 'Idle' && $requested->status != 'Complete')
                        <form action="/allocate/{{ $requested->id }}" method="post">
                            @csrf
                            <input type="hidden" name="material_id" value="{{ $requested->material_id }}">
                            <button type="submit" class="btn btn-success btn-sm">Allocate</button>
                        </form>
                    @elseif($requested->status == 'Pending' || $requested->status == 'Processing')
                        <i>Requested material is not idle</i>
                    @endif

                    @if($countingIdle == 0 && $requested->status == 'Pending')
                        <form action="/process-request/{{ $requested->id }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Process Request</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if ($requested->materialInfo->working_status != 'Idle' && ($requested->status == "Pending" || $requested->status == "Processing"))
    <div class="row">
        <div class="col-md-6 mx-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="4">Materials in requested category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category->materialInfo as $material)
                        <tr>
                            <td>{{ $material->name }}</td>
                            <td>{{ $material->working_status }}</td>
                            <td>
                                @if ($material->material_request_id != null)
                                    In use by {{ $material->materialRequest->location }}, {{ $material->materialRequest->district->name }}
                                @endif
                            </td>
                            <td>
                                @if ($material->working_status == 'Idle')
                                    <form action="/allocate/{{ $requested->id }}" method="post">
                                        @csrf
                                        <input type="hidden" name="material_id" value="{{ $material->id }}">
                                        <button type="submit" class="btn btn-success btn-sm">Allocate This Instead</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection