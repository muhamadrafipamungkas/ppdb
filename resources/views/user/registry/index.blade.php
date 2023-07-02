@extends('adminlte::page')

@section('title', 'My Registry')

@section('content')
    <div class="row pt-4">
        <div class="col-lg-12 margin-tb">
            <div class="float-left d-inline-block">
                <h2>Registry</h2>
            </div>
            <div class="float-right d-inline-block">
                <a class="btn btn-success" href="{{ route('registries.create') }}">Create New Registry</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Registry Number</th>
            <th>Status</th>
            <th>Notes</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($registries as $registry)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $registry->name }}</td>
                <td>{{ $registry->registry_number }}</td>
                <td>{{ $registry->notes }}</td>
                <td>{{ $registry->status }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('registries.show',$registry->id) }}">Show</a>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $registries->links() !!}
@stop
