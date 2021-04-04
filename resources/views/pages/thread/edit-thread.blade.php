@extends('layouts.app')

@section('content')
@livewire('thread.edit', [
    'threadID' => $thread->id,
    'title' => $thread->title,
    'content' => $thread->content,
    'topic' => $thread->topic,
    'path' => $thread->image_path
    ])
@endsection 