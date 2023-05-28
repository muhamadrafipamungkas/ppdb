@extends('adminlte::page')

@section('title', 'Suggestion List')

@section('content')
    <div class="row pt-4">
        <div class="col-lg-12 margin-tb">
            <div class="float-left d-inline-block">
                <h2>Suggestion List</h2>
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
            <th>Email</th>
            <th>Date</th>
            <th>Suggestion</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($suggestions as $suggestion)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $suggestion->user ? $suggestion->user->email : '' }}</td>
                <td>{{ $suggestion->created_at }}</td>
                <td>{{ \Illuminate\Support\Str::limit($suggestion->suggestion, 20, '...') }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('suggestions.show',$suggestion->id) }}">Show</a>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $suggestions->links() !!}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        //
    </script>
@stop
