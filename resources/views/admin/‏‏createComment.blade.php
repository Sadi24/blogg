@extends('layout')
@section('content')

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2>
                  Create Comment

                  <a href="/" class="btn btn-default pull-right"
                    >Go Back</a
                  >
                </h2>
                  @include('partials._errors')
              </div>

              <div class="panel-body">

                <form
                  method="POST"
                  action="/admin/comments"
                  accept-charset="UTF-8"
                  class="form-horizontal"
                  role="form"
                >

                @csrf
                  <div class="form-group">
                    <label for="content" class="col-md-2 control-label"
                      >Content</label
                    >

                    <div class="col-md-8 {{ $errors->first('content') ? "has-error" : ""}}" >
                      <input
                        class="form-control"
                        required="required"
                        autofocus="autofocus"
                        name="content"
                        type="text"
                        id="content"
                      />
                      <div class="text-danger">
                          {{$errors->first('content')}}
                      </div>

                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="post_id" class="col-md-2 control-label"
                      >Post</label
                    >

                    <div class="col-md-8">
                      <select
                        class="form-control"
                        required="required"
                        id="post_id"
                        name="post_id">
                        @foreach($posts as $item)
                           <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach

                        </select>
                        <span class="help-block">
                            <strong></strong>
                        </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                      <button type="submit" class="btn btn-primary">
                        Create
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
