@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="/lessons" method="POST">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <label for="Title">
                            Title:
                        </label>
                        <input class="form-control" id="title" name="title" placeholder="title" type="text"/>

                    </div>
                    <div class="form-group">
                    <textarea class="form-control" name="body" placeholder="body" rows="10">
                    </textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">
                            Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
