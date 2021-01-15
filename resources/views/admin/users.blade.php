@extends('layout')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Users
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Admin?</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $users)
                                <tr>
                                    <td>{{$users->name }}</td>
                                    <td>{{ $users->email }}</td>
                                    @if ($users->isAdmin == 0)
                                    <td>no</td>

                                    @else
                                    <td>yes</td>

                                    @endif

                                    <td>
                                        <form style="display: inline;" action="/admin/users/{{$users->id}}" method="post">
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
