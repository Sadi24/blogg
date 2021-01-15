@extends('layout')
@section('content')


      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2>
                  Create Post

                  <a href="/admin/posts" class="btn btn-default pull-right"
                    >Go Back</a
                  >
                </h2>

              @include('partials._errors')

              </div>

              <div class="panel-body">
                <form
                  method="POST"
                  action="/admin/posts"
                  accept-charset="UTF-8"
                  class="form-horizontal"
                  role="form"
                >

                @csrf
                <div class="form-group">
                    <label for="title" class="col-md-2 control-label"
                      >Title</label
                    >

                  <div class="col-md-8 {{ $errors->first('title') ? "has-error" : ""}}">
                      <input
                        class="form-control"
                        autofocus="autofocus"
                        name="title"
                        type="text"
                        id="title"
                      />

                    <div class="text-danger">
                        {{$errors->first('title')}}
                    </div>
                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="auther" class="col-md-2 control-label"
                      >Auther</label
                    >

                  <div class="col-md-8 {{ $errors->first('auther') ? "has-error" : ""}}">
                      <input
                        class="form-control"

                        autofocus="autofocus"
                        name="auther"
                        type="text"
                        id="auther"
                      />
                      <div class="text-danger">
                        {{$errors->first('auther')}}
                    </div>
                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                </div>

                  <div class="form-group">
                    <label for="body" class="col-md-2 control-label"
                      >Body</label
                    >

                    <div class="col-md-8 {{ $errors->first('body') ? "has-error" : ""}}">
                      <textarea
                        class="form-control"

                        name="body"
                        cols="50"
                        rows="10"
                        id="body"
                      ></textarea>
                      <div class="text-danger">
                        {{$errors->first('body')}}
                    </div>

                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="category_id" class="col-md-2 control-label"
                      >Category</label
                    >

                    <div class="col-md-8 {{ $errors->first('category_id') ? "has-error" : ""}}">
                      <select
                        class="form-control"
                        required="required"
                        id="category_id"
                        name="category_id">
                        @foreach ($categorys as $category)
                        <option value="{{ $category->id }}">{{ $category->name}}</option>
                        @endforeach
                        </select>
                        <div class="text-danger">
                            {{$errors->first('category_id')}}
                        </div>


                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="tag_id" class="col-md-2 control-label"
                      >Tag</label
                    >

                    <div class="col-md-8 {{ $errors->first('tag_id') ? "has-error" : ""}} " >
                      <select
                        class="form-control"
                        id="tag_id"
                        name="tag_id[]"
                        multiple
                        >

                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                        </select
                      >
                      <div class="text-danger">
                        {{$errors->first('tag_id')}}
                      </div>

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
