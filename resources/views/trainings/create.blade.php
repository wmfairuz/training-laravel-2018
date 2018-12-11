@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div align="left" style="margin-bottom: 5px">

                    <a class="btn btn-primary btn-sm" href="{{ url('trainings') }}">Back to Training List</a>

                </div>
                <div class="card">
                    <div class="card-header">Insert new Training</div>
                    <div class="card-body">
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
                        <form method="post" action="{{url('trainings')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="usr">Training Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="pwd">Description</label>
                                <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                            </div>

                            <div class="form-group">
                                <label for="pwd">Trainer</label>
                                <input type="text" class="form-control" name="trainer" value="{{ old('trainer') }}">
                            </div>

                            <button type="submit" class="btn btn-info"> Insert to DB</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection