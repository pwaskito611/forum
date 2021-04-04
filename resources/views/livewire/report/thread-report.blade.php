<div class="absolute" style="left: 50%;">
    <div class="bg-white border rounded relative p-4 " style="left: -50%;">
    <form wire:submit.prevent="submit">
        <p class="font-medium">Alasan :</p>
        <input type="radio" id="spam" name="reason" class="reason-{{$threadID}}" wire:model="reason" value="spam">
        <label for="male">Spam</label><br>
        <input type="radio" id="tidak-pantas" name="reason" class="reason-{{$threadID}}" wire:model="reason" value="tidak pantas">
        <label for="male">Tidak Pantas</label><br><br>
        <label for="additional" class="font-medium">Keterangan tambahan</label><br>
        
        <textarea name="additional" id="additional"  wire:model="additional" rows="5" class="bg-gray-100"></textarea>
        <br><br>
        <div class="flex">
            <button type="submit" id="submit-report-{{$threadID}}" class="bg-red-400 rounded px-4 py-2 mr-2 text-white ">Report</button>
            <button onclick="return false;" id="cancel-report-thread-{{$threadID}}" class="text-white rounded px-4 py-2 bg-gray-400">Cancel</button>
        </div>
    </form>
</div>
</div>

<script>
    $('#cancel-report-thread-{{$threadID}}').click(function() {
        show = false;
        $('#div-report-thread-{{$threadID}}').hide();
    });

    $('#submit-report-{{$threadID}}').click(function() {
        
        if( $("input[class=reason-{{$threadID}}]:checked").val() != null ) {
            alert('Laporan telah dikirim');
            show = false;
            $('#div-report-thread-{{$threadID}}').hide();
        } 
        
    });

</script>