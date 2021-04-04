@extends('layouts.app')

@section('content')
    @livewire('comment.edit', [
        'commentID' => $comment->id,
        'comment' => $comment->comment,
        'image_path' => $comment->image_path,
        ])
@endsection