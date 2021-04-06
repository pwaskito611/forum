@extends('layouts.app')

@section('content')
<div class="container mx-auto lg:px-20 grid grid-cols-6">
    <div class="hidden lg:block col-span-1">
        @include('includes.left-bar')
    </div>
    <div class="col-span-6 lg:col-span-3  mt-5">
        <div class="bg-white  grid grid-cols-10 rounded border">
            <div class="grid-1">
                <center>
                    @livewire('thread.vote', [
                        'vote' => sizeof($thread['threadUpvote'])  - sizeof($thread['threadDownVote']),  
                        'thread' => $thread
                        ])
                </center>
            </div>
            <div class="col-span-9 px-2 py-2 word-break">
                <div class="flex">
                  @if ($thread['user']->photo_path != null)
                  <img src="{{url($thread['user']->photo_path)}}" class="w-6 h-6 rounded-full">
                  @else
                  <img src="{{url('asset/man.svg')}}" class="w-6 h-6 rounded-full">
                  @endif
                  <p>{{$thread['user']->name}}</p>
                  <time class="timeago ml-1 font-light since-time text-gray-400" datetime="{{date('Y-m-d H:i:s',strtotime('+7 hour',strtotime($thread->created_at)))}}"></time>
                  @include('includes.thread-action', [
                                'userID' => $thread['user']->id,
                                'threadID' => $thread->id
                                ])
                </div>
                <h1 class="text-3xl font-regular break-all">{{$thread->title}}</h1>
                 <div class="mb-3  text-left break-all">
                     @if ($thread->image_path !== null)
                         <img src="{{url($thread->image_path)}}" class="max-w-full " style="max-height: 400px;">
                     @endif
                    <p class="whitespace-pre-line break-all -mt-4">
                         {{$thread->content}}
                    </p>
                 </div>
                 
            </div>
            <div class="col-span-1"></div>
            <div class="col-span-9 flex">
                <a href="{{url('thread/' . $thread->id)}}" class="ml-2 text-gray-400">{{sizeof($thread['comment'])}} <i class="fas fa-comments"></i> Komentar</a>
                @livewire('thread.follow', ['threadID' => $thread->id])
                @include('includes.share-thread', ['threadID' => $thread->id])
            </div>
         </div>
         <div class="bg-white my-5 grid grid-cols-10 px-2 py-2 rounded border container mx-auto px-2">
            <div class="col-span-10">
                <div class="flex">
                    <h1 class="text-xl mt-2"><i class="fas fa-comments"></i> Balasan</h1>
                     <a href="#add-comment-form" class="ml-auto py-2 px-4 text-white bg-red-400 rounded"
                     id="btn-add-comment">
                        Tambahkan Komentar
                    </a>
                </div>
            </div>
            @php $i = 0; @endphp
         @forelse ($comments as $comment)   
            @php $i++; @endphp
             <div class="grid-1">
                 @livewire('comment.vote', [
                     'commentID' => $comment->id,
                     'voted' => sizeof($comment['commentUpvote']) - sizeof($comment['commentDownVote'])
                     ])
             </div>
             <div class="col-span-9 px-2 py-2">
               <div class="flex">
                   @if ($comment['user']->photo_path != null)
                    <img src="{{url($comment['user']->photo_path)}}" class="w-6 h-6 rounded-full">
                   @else
                    <img src="{{url('asset/man.svg')}}" class="w-6 h-6 rounded-full">
                   @endif
                   <p>{{$comment['user']->name}}</p>
                   <time class="timeago ml-1 font-light since-time text-gray-400" datetime="{{date('Y-m-d H:i:s',strtotime('+7 hour',strtotime($comment->created_at)))}}"></time>
                  @include('includes.comment-action', ['commentID' => $comment->id, 'userID' => $comment->user_id])
                </div>
               <div class="mb-3 break-all whitespace-pre-line -mt-5">
                   @if($comment->image_path != null)
                   <img src="{{url($comment->image_path)}}" class="max-w-full mt-1" style="max-height: 400px;">
                   @endif
                   {{$comment->comment}}
               </div>
               
             </div>
             <div class="grid-1"></div>
             <div class="col-span-9">
                    @livewire('comment.reply-comment', ['commentID' => $comment->id])
             </div>
             @if ($i != sizeof($comments))
                <div class="col-span-10 border-b"></div>
             @endif
         @empty
             
         @endforelse       
            <div id="pagination-comment" class="col-span-10 mt-5">
                {{$comments->links()}}
            </div> 
            </div>
             @livewire('comment.create', ['threadID' => $thread->id])
         </div>
         
    <div class="hidden lg:block col-span-2 mt-5 ml-5 container">
        <div class="bg-white border rounded px-4">
         <h1 class="text-2xl font-medium mt-3">Diskusi yang diikuti</h1>
         <div class="border mt-2"></div>
         @livewire('thread.followed')
        </div>
     </div>  
</div>

<script>
    $(document).ready(function(){
        $("time.timeago").timeago();
    });

    if ( !$('#pagination-comment').children().length > 0 ) {
        $('#pagination-comment').hide();
    }
</script>

@endsection