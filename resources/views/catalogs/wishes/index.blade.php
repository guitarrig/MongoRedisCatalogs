@extends('layouts.app')

 @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your wishes =)</div>

                 <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!($wishes->isEmpty()))
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Description</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i = 0; ?>
                      @foreach ($wishes as $wish)
                      <tr>
                        <td>{{++$i}}</td>
                        <td>{{$wish['name']}}</td>
                        <td>{{$wish['description']}}</td>
                        <td>
                          <form method="post" action="{{route('wishes.destroy', $wish->_id)}}">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Delete">
                          </form>
                        </td>
                        <td>
                          <form method="post" action="{{route('wishes.edit', $wish->_id)}}">
                            @method('GET')
                            @csrf
                            <input type="submit" class="btn btn-primary" value="Edit">
                          </form>
                      </td>

                      @endforeach;
                    </body>
                    </table>
                    @else
                    The catalog is empty
                    @endif
                     <form action="{{route('wishes.create')}}" method="post">
                       @csrf
                      @method('GET')
                      <input type="submit" value="Add some wish" class="btn btn-primary">
                      <input type="hidden" value="{{$id}}" name="id">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
