@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                 <thead>
                   <tr>
                     <th>#</th>
                     <th>Catalog</th>
                     <th>Todos number</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php $i = 0; ?>
                   @foreach ($catalogs as $catalog)
                   <tr>
                     <td>{{++$i}}</td>
                     <td><a href="{{route('catalogs.show', $catalog->id)}}">{{$catalog->name}}</a></td>
                     <td>
                       <form method="post" action="{{route('catalogs.destroy', $catalog->_id)}}">
                         @method('DELETE')
                         @csrf
                         <input type="submit" class="btn btn-danger" value="Delete">
                       </form>
                     </td>
                     <td>
                       <form method="post" action="{{route('catalogs.edit', $catalog->_id)}}">
                         @method('GET')
                         @csrf
                         <input type="submit" class="btn btn-primary" value="Edit">
                       </form>
                   </td>

                   @endforeach;
                 </tbody>
               </table>

                    <form action="{{route('catalogs.create')}}" method="post">
                      @method('GET')
                      <input type="submit" value="Create new catalog" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
