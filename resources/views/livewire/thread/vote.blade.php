<div class="py-5">
    @if ($upVoted)
    <a class="text-5xl  mt-10 my-auto text-black border-none" href="#" onclick="return false;" wire:click="upVote" ><i class="fas fa-sort-up"></i></a>
    @else 
    <a class="text-5xl  mt-5 my-auto text-gray-400 border-none" href="#" onclick="return false;" wire:click="upVote" ><i class="fas fa-sort-up"></i></a>
    @endif
    
    <p class="text-xl text-gray-500">{{$vote}}</i></p>
    
    @if ($downVoted)
    <a href="#" class="text-5xl  text-black" onclick="return false;" wire:click="downVote"><i class="fas fa-sort-down"></i></a>
    @else 
    <a href="#" class="text-5xl  text-gray-400" onclick="return false;" wire:click="downVote"><i class="fas fa-sort-down"></i></a>
    @endif

</div>
  