@extends('layout')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Tags

                            <a href="/admin/tags/create" class="btn btn-default pull-right">Create New</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($tags as $tag)
                                <tr>
                                    <td>{{$tag->name}}</td>
                                    <td>
                                        <a href="/admin/tags/{{ $tag->id }}/edit" class="btn btn-xs btn-info">Edit</a>
                                        <form style="display: inline;" action="/admin/tags/{{$tag->id}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
