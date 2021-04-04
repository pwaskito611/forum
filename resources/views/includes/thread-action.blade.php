<div class="ml-auto">
<button  id="ellips-show-thread-{{$threadID}}" class="text-gray-400"><i class="fas fa-ellipsis-h"></i></button>
<button  class="hidden text-gray-400" id="ellips-hide-thread-{{$threadID}}"><i class="fas fa-ellipsis-h"></i></button>
<div class="absolute bg-white border rounded hidden -ml-20" id="action-thread-{{$threadID}}">
<ul>
    @auth 
   @if ($userID == Auth::user()->id)
    <li class="hover:bg-gray-200">
        <form action="{{url('edit/thread')}}" method="get">
        <input type="hidden" name="id" value="{{$threadID}}">
        <button type="submit" class="py-2 pl-4 pr-8 "><i class="fas fa-pen"></i> Edit</button>
        </form>
    </li>
    <li class="hover:bg-gray-200">
        <form action="{{url('delete/thread')}}" method="post">
            @csrf 
            @method('delete')
            <input type="hidden" name="id" value="{{$threadID}}">
            <input type="hidden" name="url" value="{{url()->previous()}}">
            <button type="submit" class="py-2 px-4"><i class="fas fa-trash"></i> Hapus</button>
        </form> 
    </li>
   @else
    <li class="hover:bg-gray-200">
        <button id="btn-report-thread-{{$threadID}}" class="py-2 px-2"><i class="fas fa-exclamation-circle"></i> Laporkan</button>
    </li> 
   @endif
    @endauth
    @guest
    <li class="hover:bg-gray-200">
        <button id="btn-report-thread-{{$threadID}}" class="py-2 px-2"><i class="fas fa-exclamation-circle"></i> Laporkan</button>
    </li> 
    @endguest
</ul>
</div>
</div>

<div id="div-report-thread-{{$threadID}}" class="hidden">
    @livewire('report.thread-report' , ['threadID' => $threadID])
</div>

<script>
    $('#ellips-show-thread-{{$threadID}}').click(function() {
        $('#ellips-show-thread-{{$threadID}}').hide();
        $('#ellips-hide-thread-{{$threadID}}').show();
        $('#action-thread-{{$threadID}}').show();
    });

    $('#ellips-hide-thread-{{$threadID}}').click(function() {
        $('#ellips-show-thread-{{$threadID}}').show();
        $('#ellips-hide-thread-{{$threadID}}').hide();
        $('#action-thread-{{$threadID}}').hide();
    });

    var show = false;
    $('#btn-report-thread-{{$threadID}}').click(function() {
        if(show == false) {
            show = true;
            $('#div-report-thread-{{$threadID}}').show();
            $('#action-thread-{{$threadID}}').hide();
            $('#ellips-show-thread-{{$threadID}}').show();
            $('#ellips-hide-thread-{{$threadID}}').hide();
        }else {
            show = false;
            $('#div-report-thread-{{$threadID}}').hide();
        }
    });

</script>     