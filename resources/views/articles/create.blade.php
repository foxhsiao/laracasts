@extends('app')
@section('content')
    <h1>New Article</h1>
    <hr>
    {!! Form::open(['url' => 'articles']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Title:') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        </div>

    <!-- Add Article Form Input -->
    <div class="form-group">
        {!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection