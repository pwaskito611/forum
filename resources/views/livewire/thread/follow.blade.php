@if ($isFollowed)
<a href="#" wire:click="follow" onclick="return false;"  class="ml-3 text-black">
    <i class="fas fa-bookmark"></i> Ikuti
</a>
@else
<a href="#" wire:click="follow" onclick="return false;"  class="ml-3 text-gray-400">
    <i class="fas fa-bookmark"></i> Ikuti
</a>   
@endif  