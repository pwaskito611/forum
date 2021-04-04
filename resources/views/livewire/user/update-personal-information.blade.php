<div class="border rounded bg-white mt-5 lg:ml-5 px-4 pb-5">
    <h2 class="text-xl text-center mt-4">Informasi Pribadi</h2>
    <form wire:submit.prevent="submit"> 
        <label for="name" class="text-m mt-5">Name</label><br>
        <input type="text" name="name" id="name" wire:model="name"
        class="bg-gray-100 rounded" style="width: 100%;">
        <br>
        <label for="description">deskripsi</label>
        <textarea name="description" id="description" rows="3" class="w-full bg-gray-100 rounded"
        wire:model="description">
        </textarea>
        @if ($success == true)
            <p class="text-red-400">Data telah diperbarui</p>
        @endif
        
        <button type="submit" class="py-2 px-4 rounded bg-red-400 center text-white w-full mt-5">Perbarui</button>
    </form>
</div>
