@extends('layout')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Categories

                            <a href="categories/create" class="btn btn-default pull-right">Create New</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Post Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($category as $sadi)
                                <tr>
                                    <td>{{ $sadi->name }}</td>
                                    <td>{{ $sadi->posts_count}}</td>
                                    <td>
                                        <a href="/admin/categories/{{ $sadi->id}}/edit" class="btn btn-xs btn-info">Edit</a>
                                        <form style="display: inline;" action="/admin/categories/{{$sadi->id}}" method="post">
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
@endsection
