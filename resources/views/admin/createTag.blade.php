@extends('layout')
@section('content')
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2>
                  Create Tag

                  <a href="/admin/tags" class="btn btn-default pull-right"
                    >Go Back</a
                  >
                </h2>
                  @include('partials._errors')
              </div>

              <div class="panel-body">

                <form
                  method="POST"
                  action="/admin/tags"
                  class="form-horizontal"
                >
                {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
                {{-- {{ csrf_field() }} --}}
                @csrf
                  <div class="form-group">
                    <label for="name" class="col-md-2 control-label"
                      >Name</label
                    >

                    <div class="col-md-8 {{ $errors->first('name') ? "has-error" : ""}}">
                      <input
                        class="form-control"
                        autofocus="autofocus"
                        name="name"
                        type="text"
                        id="name"
                      />
                      <div class="text-danger">
                          {{$errors->first('name')}}
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
