<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Title:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Published_at Form Input -->
<div class="form-group">
    {!! Form::label('published_at', 'Publish On:') !!}
    {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Tags Form Input -->
<div class="form-group">
    {!! Form::label('tag_list', 'Tags') !!}
    {!! Form::select('tag_list[]', $tags, null, ['class' => 'form-control', 'multiple']) !!}
</div>

<!-- Add Article Form Input -->
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>