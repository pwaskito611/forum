<div class="border rounded bg-white mt-5 lg:ml-5 px-4 pb-5">
    <h2 class="text-xl text-center mt-4">Password</h2>
    <form wire:submit.prevent="submit">
        <label for="password">Password Lama</label><br>
        <input type="password" name="password" id="password"
        class="bg-gray-100 rounded w-full" wire:model="password"  required>
        
        <label for="new-password">Password Baru</label>
        <input type="password" name="new-password" id="new-password"
        class="bg-gray-100 rounded w-full" wire:model="newPassword" required><br>
        
        <label for="confirm-password">Konfirmasi Password</label><br>
        <input type="password" name="confirm-password" id="confirm-password"
        class="bg-gray-100 rounded w-full" wire:model="rePassword"   required>
        
        @error('newPassword') <span class="text-red-400">{{ $message }}</span> @enderror

        @if($isSuccess === true)
        <p class="text-red-400">Password telah diperbarui</p>
        @endif

        @if($isSuccess === false)
        <p class="text-red-400">Password yanga anda masukkan salah</p>
        @endif

        <button type="submit" class="py-2 px-4 rounded bg-red-400 center text-white w-full mt-5">Perbarui</button>
    </form>
</div>