<div class="ml-auto">
<button  id="ellips-show-comment-{{$commentID}}" class="text-gray-400"><i class="fas fa-ellipsis-h"></i></button>
<button  class="hidden text-gray-400" id="ellips-hide-comment-{{$commentID}}"><i class="fas fa-ellipsis-h"></i></button>
<div class="absolute bg-white border rounded hidden -ml-20" id="action-comment-{{$commentID}}">
<ul>
    @auth 
   @if ($userID == Auth::user()->id)
   <li class="hover:bg-gray-200">
        <form action="{{url('edit/comment')}}" method="get">
        <input type="hidden" name="id" value="{{$commentID}}">
        <button type="submit" class="py-2 pl-4 pr-8 "><i class="fas fa-pen"></i> Edit</button>
        </form>
    </li>
    <li class="hover:bg-gray-200">
        <form action="{{url('delete/comment')}}" method="post">
            @csrf 
            @method('delete')
            <input type="hidden" name="id" value="{{$commentID}}">
            <button type="submit" class="py-2 px-4"><i class="fas fa-trash"></i> Hapus</button>
        </form>
    </li> 
   @else
   <li class="hover:bg-gray-200">
        <li class="hover:bg-gray-200">
            <button id="btn-report-comment-{{$commentID}}" class="py-2 px-2"><i class="fas fa-exclamation-circle"></i> Laporkan</button>
        </li> 
    </li> 
   @endif
    @endauth
    @guest
    <li class="hover:bg-gray-200">
        <button id="btn-report-comment-{{$commentID}}" class="py-2 px-2"><i class="fas fa-exclamation-circle"></i> Laporkan</button>
    </li>    
    @endguest
</ul>
</div>
</div> 

<div id="div-report-comment-{{$commentID}}" class="hidden">
    @livewire('report.comment-report' , ['commentID' => $commentID])
</div>

<script>
    $('#ellips-show-comment-{{$commentID}}').click(function() {
        $('#ellips-show-comment-{{$commentID}}').hide();
        $('#ellips-hide-comment-{{$commentID}}').show();
        $('#action-comment-{{$commentID}}').show();
    });

    $('#ellips-hide-comment-{{$commentID}}').click(function() {
        $('#ellips-show-comment-{{$commentID}}').show();
        $('#ellips-hide-comment-{{$commentID}}').hide();
        $('#action-comment-{{$commentID}}').hide();
    });
 
    var showCommentReportForm = false;
    $('#btn-report-comment-{{$commentID}}').click(function() {
        if(showCommentReportForm == false) {
            showCommentReportForm = true;
            $('#div-report-comment-{{$commentID}}').show();
            $('#action-comment-{{$commentID}}').hide();
            $('#ellips-show-comment-{{$commentID}}').show();
            $('#ellips-hide-comment-{{$commentID}}').hide();
        }else {
            showCommentReportForm = false;
            $('#div-report-comment-{{$commentID}}').hide();
        }
    });

</script>     