@extends('layout')
@section('content')

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2>
                  {{$post->title}}
                  <small>by Prof. {{ $post->auther }}</small>

                  <a href="/admin/posts" class="btn btn-default pull-right"
                    >Go Back</a
                  >
                </h2>
              </div>

              <div class="panel-body">
                <p>
                  {{$post->body}}
                </p>

                <p><strong>Category:</strong> {{ $post->category->name }} </p>
                @foreach ($post->tags as $posts)
                <p><strong>Tags:</strong>{{ $posts->name }}</p>

                @endforeach

              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
