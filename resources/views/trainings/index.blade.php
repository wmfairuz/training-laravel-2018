@extends('layouts.generic')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div align="right" style="margin-bottom: 5px">

                    <a class="btn btn-primary btn-sm" href="{{ url('trainings/create') }}">New Training </a>

                </div>
                <div class="card info">

                    <div class="card-header">Listing Trainings

                        <form method="get" action="{{ url('trainings') }}" class="form-inline">
                            {{ csrf_field() }}
                            <input type="text" id="txtsearch" name="txtsearch" class="form-control">
                            <button type="submmit" class="btn btn-primary">
                                Search
                            </button>
                        </form>

                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('successdelete'))
                            <div class="alert alert-warning">
                                {{ session('successdelete') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Training Name</th>
                                <th>Desc</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($training_list as $training)
                                <tr>
                                    <td>{{$training['id']}}</td>
                                    <td>{{$training['name']}}</td>
                                    <td>{{$training['description']}}</td>
                                    <td>
                                        <a href="{{action('TrainingController@edit', $training['id'])}}"
                                           class="btn btn-warning btn-sm">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{action('TrainingController@destroy', $training['id'])}}"
                                              method="post">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            <tbody>
                        </table>
                            {{ $training_list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
