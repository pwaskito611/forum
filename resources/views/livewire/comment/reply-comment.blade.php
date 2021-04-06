<div class="container mx-auto px-2 bg-gray-100 py-2 rounded">
    <form action="{{url('create/reply-answer')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$commentID}}">
        <div class="flex">
            <input type="text" name="comment" id="comment" class="rounded flex-grow" >
        <button type="submit" class="bg-red-400 text-white  py-2  px-4 rounded ml-auto"><i class="fas fa-paper-plane"></i></button>
        </div>
    </form>

    @if (sizeof($reply) > 0)
    <center>
        <a href="#" onclick="return false;" id="show-reply-{{$commentID}}" class="mt-1 text-blue-400">Show Reply</a>
        <a href="#" onclick="return false;" id="hide-reply-{{$commentID}}" class="mt-1 hidden text-blue-400">Hide Reply</a>
    </center>   
    @endif
</div>

@php $j = 0; @endphp
@foreach ($reply as $r)
@php $j++; @endphp

<div class="container mx-auto px-2 bg-gray-100 flex flex-col hidden reply-{{$r->comment_id}}">
    <div class="flex">
        @if ($r['user']->photo_path != null)
        <a href="{{url('user/'. $r['user']->id)}}">
            <img class="w-6 h-6 rounded-full" src="{{url($r['user']->photo_path)}}">
        </a>
        @else
       <a href="{{url('user/'. $r['user']->id)}}">
        <img class="w-6 h-6 rounded-full" src="{{url('asset/man.svg')}}">
       </a>
        @endif
        <a href="{{url('user/'. $r['user']->id)}}" class="ml-1">{{$r['user']->name}}</a>
        <time class="timeago ml-1 font-light since-time text-gray-400" datetime="{{date('Y-m-d H:i:s',strtotime('+7 hour',strtotime($r->created_at)))}}"></time>
        @include('includes.reply-action', ['commentID' => $r->id , 'userID' => $r['user']->id])
    </div>
    <div class="break-all">
        <p>{{$r->comment}}</p>
    </div>
    @if ($j != sizeof( $reply ))
        <div class="border-b"></div>
    @endif
</div>

<script>
    $('#show-reply-{{$commentID}}').click(function () {
        $('#show-reply-{{$commentID}}').hide();
        $('#hide-reply-{{$commentID}}').show();
        $('.reply-{{$commentID}}').show();
    });

    $('#hide-reply-{{$commentID}}').click(function () {
        $('#show-reply-{{$commentID}}').show();
        $('#hide-reply-{{$commentID}}').hide();
        $('.reply-{{$commentID}}').hide();
    });
</script>

@endforeach