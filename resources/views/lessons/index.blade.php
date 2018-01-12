@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @foreach ($lessons as $lesson)
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>
                        {{ $lesson->title }}
                    </h3>
                </div>
                <div class="panel-body">
                    <p>
                        {{ $lesson->body }}
                        <small class="flex">
                            {{ $lesson->created_at->diffForHumans() }}
                        </small>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop
