@extends('layout')
@section('title' , 'Home')
@section('content')

  <div class="modal fade" id="sadi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">add Comment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="addcomment">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="content">content</label>
                  <input type="text" class="form-control" id="content" name="content" >
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Post</label>
                  <select class="form-control" id="post_id"
                  name="post_id[]">
                  @foreach ($posts as $item)
                  <option value="{{ $item->id }}"
                    @foreach ($comments as $comment)
                         {{$comment->post->id == $comment->post->id  ? "selected" : "" }}
                    @endforeach

                    >{{ $item->title }}</option>
                  @endforeach
                  </select>
                </div>

            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="add" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

    <div class="container">

        <div class="row form-search">
            <form method="GET" action="" accept-charset="UTF-8" role="form">
                <div class="col-md-10">
                    <input class="form-control" placeholder="Search..." name="search" type="text">
                </div>
                <div class="col-md-2">
                    <input class="btn btn-block btn-default" type="submit" value="Sumbit">
                </div>
            </form>
        </div>

        <div class="row">
            @guest
            <div class="col-md-12">
                @foreach ($posts as $item)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{$item->title}} <small>by Prof. {{$item->auther}}</small>

                            <span class="pull-right">
                                 {{ $item->created_at }}
                            </span>
                        </div>

                        <div class="panel-body">
                            <p>{{$item->body}}</p>

                            <p>
                                Tags:
                                @foreach ($item->tags as $tag )
                                <span class="label label-danger">{{$tag->name}}.</span>
                               @endforeach
                            </p>
                            <p>
                                <span class="btn btn-sm btn-success">{{ $item->category->name }}</span>
                            <a href="/post/{{$item->id}}" class="btn btn-sm btn-primary">See more</a>
                            </p>
                        </div>
                    </div>
                @endforeach

                <div class="text-center">
                    {{$posts->links()}}
                </div>

            </div>
            @else
            <div class="col-md-12">
                @foreach ($posts as $item)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{$item->title}} <small>by Prof. {{$item->auther}}</small>

                            <span class="pull-right">
                                 {{ $item->created_at }}
                            </span>
                        </div>

                        <div class="panel-body">
                            <p>{{$item->body}}</p>

                            <p>

                                @foreach ($item->tags as $tag )
                               Tags: <span class="label label-danger">{{$tag->name}}.</span>
                               @endforeach
                            </p>
                            <p>
                                <span class="btn btn-sm btn-success">{{ $item->category->name }}</span>
                                <button type="submit"  class="btn btn-primary" data-toggle="modal" data-target="#sadi">
                                   comment
                                  </button>

                            <a href="/post/{{$item->id}}" class="btn btn-sm btn-primary">See more</a>
                            </p>
                        </div>
                    </div>
                 @endforeach

                </div>

                <div class="text-center">
                    {{$posts->links()}}
                </div>

            </div>

            @endguest

        </div>



    </div>
 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <script>
     $("#add").click(function(){
       var data =  $("#addcomment").serialize();
       $.post("/admin/comments", data).done(function(){
           $("#sadi").modal("hide");
           location.reload();
       });
     });
 </script>
 @endsection
