@extends('layouts.app')

@section('content')

<!-- Write content for each page here -->
 <h1>id = {{ $tasklist->id }} のタスク詳細ページ</h1>

    <p>{{ $tasklist->content }}</p>
    {!! link_to_route('tasklists.edit', 'このタスクを編集', ['id' => $tasklist->id]) !!}

    {!! Form::model($tasklist, ['route' => ['tasklists.destroy', $tasklist->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除') !!}
@endsection