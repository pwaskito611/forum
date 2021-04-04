<div class="ml-auto">
    <button  id="ellips-show-reply-comment-{{$commentID}}" class="text-gray-400"><i class="fas fa-ellipsis-h"></i></button>
    <button  class="hidden text-gray-400" id="ellips-hide-reply-comment-{{$commentID}}"><i class="fas fa-ellipsis-h"></i></button>
    <div class="absolute bg-white border rounded hidden -ml-20" id="action-reply-comment-{{$commentID}}">
    <ul>
        @auth 
       @if ($userID == Auth::user()->id)
        <li class="hover:bg-gray-200">
            <form action="{{url('delete/reply-answer')}}" method="post">
                @csrf 
                @method('delete')
                <input type="hidden" name="id" value="{{$commentID}}">
                <button type="submit" class="py-2 px-4"><i class="fas fa-trash"></i> Hapus</button>
            </form>
        </li>
       @else
        <li class="hover:bg-gray-200">
            <button id="btn-report-reply-comment-{{$commentID}}" class="py-2 px-2"><i class="fas fa-exclamation-circle"></i> Laporkan</button>
        </li>
       @endif
        @endauth
        @guest 
        <li class="hover:bg-gray-200">
            <button id="btn-report-reply-comment-{{$commentID}}" class="py-2 px-2"><i class="fas fa-exclamation-circle"></i> Laporkan</button>
        </li>
        @endguest
    </ul>
    </div>
    </div>
    
    <div id="div-report-reply-comment-{{$commentID}}" class="hidden">
        @livewire('report.reply-comment-report' , ['commentID' => $commentID])
    </div>

    <script>
        $('#ellips-show-reply-comment-{{$commentID}}').click(function() {
            $('#ellips-show-reply-comment-{{$commentID}}').hide();
            $('#ellips-hide-reply-comment-{{$commentID}}').show();
            $('#action-reply-comment-{{$commentID}}').show();
        });
    
        $('#ellips-hide-reply-comment-{{$commentID}}').click(function() {
            $('#ellips-show-reply-comment-{{$commentID}}').show();
            $('#ellips-hide-reply-comment-{{$commentID}}').hide();
            $('#action-reply-comment-{{$commentID}}').hide();
        });

        var showReplyReportForm = false;
        $('#btn-report-reply-comment-{{$commentID}}').click(function() {
            if(showReplyReportForm == false) {
                showReplyReportForm = true;
                $('#div-report-reply-comment-{{$commentID}}').show();
                $('#action-reply-comment-{{$commentID}}').hide();
                $('#ellips-show-reply-comment-{{$commentID}}').show();
                $('#ellips-hide-reply-comment-{{$commentID}}').hide();
            }else {
                showReplyReportForm = false;
                $('#div-report-reply-comment-{{$commentID}}').hide();
            }
        });

    </script>     