<div class="container mx-auto lg:px-60">
    <div class="bg-white rounded border container mx-auto px-2 py-2 mt-5" id="add-comment-form">
        <h1 class="text-2xl"><i class="fas fa-comment-dots"></i> Balasan</h1>
        <form method="POST" action="{{url('update/comment')}}">
          @csrf
          @method('put')
          <input type="hidden" name="id" value="{{$commentID}}">
            <textarea class="mt-2 bg-gray-100 h-60 whitespace-pre-line w-full" 
            id="comment" name="comment" placeholder="Balasan Anda">
            {{$comment}}   
            </textarea><br>
            <input type="hidden" name="image_path" value="{{$path}}">
                 <div  class="flex bg-gray-100 my-6 h-40 rounded w-full">
                    
                  @if($path != '')
                    <img src="{{url($path)}}" class="ml-2 my-2" ><br>
                  @endif
                    
                    <label for="image" class="mt-auto  mb-2">
                     <img src="https://icon-library.net/images/upload-photo-icon/upload-photo-icon-21.jpg" class="ml-2 w-10 h-10"/>
                   </label>
                    <input type="file" name="image" id="image" wire:model="file" class="hidden">
                </div> 
            <button type="submit" class="w-auto bg-red-500 text-white rounded w-full px-5 py-2 mt-2  mb-4">Submit</button>
        </form>
    </div>
</div>
    