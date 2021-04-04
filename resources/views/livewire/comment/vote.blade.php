<center>
    @if ($upVoted)
    <a href="#" onclick="return false;" wire:click="upVote" class="text-5xl mt-5 my-auto text-black"><i class="fas fa-sort-up"></i></a>
    @else
    <a href="#" onclick="return false;" wire:click="upVote" class="text-5xl mt-5 my-auto text-gray-400"><i class="fas fa-sort-up"></i></a>
    @endif
    <p class="text-xl text-gray-500">{{$voted}}</i></p>
    
    @if ($downVoted)
    <a href="#" onclick="return false;" wire:click="downVote" class="text-5xl text-black"><i class="fas fa-sort-down"></i></a>
    @else
    <a href="#" onclick="return false;" wire:click="downVote" class="text-5xl text-gray-400"><i class="fas fa-sort-down"></i></a>  
    @endif
</center>