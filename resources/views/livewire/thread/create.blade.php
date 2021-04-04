<div>
    <div class="container mx-auto lg:px-60">
        <div class="mt-10 bg-white py-4 pl-4 pr-4 rounded border">
            <form action="{{url('store/thread')}}" method="post">
                @csrf
               <center>
                <!--title-->
                 <input type="text" name="title" id="title" class="bg-gray-100  mb-6 py-1 mt-2 rounded" size="50" 
                 placeholder="Title" style="width: 98%;" required>
                 <!--end title-->
                
                 <!--content-->
                 <textarea wire:model="content" class="bg-gray-100 h-60 rounded border text-left" 
                 id="content" name="content" style="width: 98%;">
                 </textarea>
                <!--end content--> 

                <!--image-->
                <input type="hidden" name="image_path" value="{{$path}}">
                 <div  class="flex bg-gray-100 my-6 h-40 rounded" style="width: 98%">
                    
                  @if($file != '' && $path != '')
                    <img src="{{url($path)}}" class="ml-2 my-2" ><br>
                  @endif
                    
                    <label for="image" class="mt-auto  mb-2">
                     <img src="https://icon-library.net/images/upload-photo-icon/upload-photo-icon-21.jpg" class="ml-2 w-10 h-10"/>
                   </label>
                    <input type="file" name="image" id="image" wire:model="file" class="hidden">
                </div> 
                <!--end image-->
               </center>
               <!--topic-->
               <label for="topic" class="ml-2">Select a Topic : </label>
               <select name="topic" id="topic" class="rounded bg-gray-100">
                  <option value="ide bisnis">ide bisnis</option>
                  <option value="rencana bisnis">rencana bisnis</option>
                  <option value="UMKM">UMKM</option>
                  <option value="startup">startup</option>
                  <option value="marketing">marketing</option>
                  <option value="relasi bisnis">relasi Bisnis</option>
                  <option value="hukum">hukum terkait bisnis</option>
                  <option value="lainnya">lainnya</option>
               </select>
               <!--end topic-->

               <div class="flex mt-4">
               <button class="bg-red-400 py-2 px-4 rounded text-white mt-2" style="margin-left: 1%">Submit</button>
               <a href="{{url()->previous()}}" class="bg-gray-400 py-2 px-4 rounded text-white mt-2 ml-2">Cancel</a>
            </form>
        </div>
        </div>
    </div>
</div>