@extends('layouts.app')

@section('content')

<!-- Write content for each page here -->
 <h1>Task lists</h1>
<style>
    h1 {
        color:green;
    }
</style>
    @if (count($tasklists) > 0)
        <ul>
            @foreach ($tasklists as $tasklist)
                <li>{!! link_to_route('tasklists.show', $tasklist->id, ['id' => $tasklist->id]) !!} :{{ $tasklist->status }} > {{ $tasklist->content }}</li>
            @endforeach
        </ul>
    @endif
     {!! link_to_route('tasklists.create', '新規タスクの投稿') !!}
@endsection