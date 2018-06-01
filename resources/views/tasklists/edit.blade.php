@extends('layouts.app')

@section('content')

<!-- Write content for each page here -->

    <h1>id: {{ $tasklist->id }} のタスクの編集ページ</h1>
<div class="row">
    <div class="col-xs-6">
    {!! Form::model($tasklist, ['route' => ['tasklists.update', $tasklist->id], 'method' => 'put']) !!}
       <div class="form-group">
        {!! Form::label('status', 'ステータス:') !!}
        {!! Form::text('status', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
    </div>
    </div>

@endsection