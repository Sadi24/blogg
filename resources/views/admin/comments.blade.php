@extends('layout')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Comments

                            <a href="/admin/comments/create" class="btn btn-default pull-right">Create New</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Post</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($comments as $comment)
                                <tr>
                                    <td>{{$comment->post['title']}}</td>
                                <td>{{$comment->content}}</td>
                                    <td>
                                        <a href="/admin/comments/{{ $comment->id }}/edit" class="btn btn-xs btn-info">Edit</a>
                                        <form style="display: inline;" action="/admin/comments/{{$comment->id}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <ul class="pagination">

                            <li class="disabled"><span>«</span></li>





                            <li class="active"><span>1</span></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>


                            <li><a href="" rel="next">»</a></li>
                        </ul>


                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection




