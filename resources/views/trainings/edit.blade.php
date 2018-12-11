@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div align="left" style="margin-bottom: 5px">

                    <a class="btn btn-primary btn-sm" href="{{ url('trainings') }}">Back to Training List</a>

                </div>

                <div class="card">
                    <div class="card-header">Training</div>

                    <div class="card-body">
                        <h2>Edit Training Record</h2>
                        <br>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <form method="post" action="{{action('TrainingController@update', $id)}}">
                            {{  csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">

                            <div class="form-group">
                                <label for="trainingname">Training Name:</label>
                                <input type="text" class="form-control" name="name"
                                       value="{{$training->name}}">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description:</label>
                                <input type="text" class="form-control" name="description"
                                       value="{{$training->description}}">
                            </div>
                            <div class="form-group">
                                <label for="trainer">Trainer:</label>
                                <input type="text" class="form-control" name="trainer"
                                       value="{{$training->trainer}}">
                            </div>
                            <button type="submit" class="btn btn-success">Save Update</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection