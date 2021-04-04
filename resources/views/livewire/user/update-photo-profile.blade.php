<div class="mt-5 rounded border bg-white py-5 pb-10">
    <center>
        <h2 class="text-xl mb-5">Foto Profil</h2>
        <label for="image" >
            <img src="{{url($photoPath)}}" class="rounded-full w-40 h-40  mb-5">
        </label>
        <input type="file" name="image" id="image" class="hidden" wire:model="image">
        <button wire:click="updatePhotoProfil" class="bg-red-400 py-2 px-4 text-white rounded"
         id="update-photo-profile">Perbarui</button>
        
         @if ($success == true)
             <p class="text-red-400">foto profil telah diperbarui</p>
         @endif
    </center>
</div>