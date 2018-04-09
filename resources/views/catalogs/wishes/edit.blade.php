@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('wishes.update', $wish->_id) }}">
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Put some new name</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="name" value="{{$wish->name}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Put some new description</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="description" value="{{$wish->description}}">

                            </div>
                        </div>
                          <input type="hidden" value="{{Auth::id()}}" name="id">


                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update!
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
