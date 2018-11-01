@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="/admin/create" class="btn btn-primary">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="/admin/{{$post->id}}/edit" class="btn btn-primary">Edit</td>
                                    <td>{!!Form::open(['action' => ['AdminController@destroy', $post->id], 'method' => 'Post', 'class' => 'float-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no posts!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection