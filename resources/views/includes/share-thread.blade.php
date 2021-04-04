<div>
    <a href="#" class="ml-3  text-gray-400" id="share-thread-{{$threadID}}" onclick="return false;">
        <i class="fas fa-share"></i> Bagikan
    </a>
    <div class="bg-white border rounded absolute py-2" id="share-thread-link-{{$threadID}}">
        <ul>
            <li class="hover:bg-gray-200">
                <a target="_blank" href='{{"https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2F" . url('/') ."%2Fthread%2F" .$threadID ."&amp;src=sdkpreparse"}}' 
                    class="fb-xfbml-parse-ignore flex py-1 px-4">
                    <img src="{{url('storage/asset/facebook.svg')}}" class="w-6 h-6">&nbsp;
                     <p class="">Facebook</p>
                </a>
            </li>
            <li class="hover:bg-gray-200">
                <a target="_blank" href='{{"https://twitter.com/share?url=https%3A%2F%2F". url('/') ."%2Fthread%2F" . $threadID}}' 
                    class="fb-xfbml-parse-ignore flex py-1 px-4">
                    <img src="{{url('storage/asset/twitter.svg')}}" class="w-6 h-6">&nbsp;
                     <p class="">Twitter</p>
                </a>
            </li>
            <li class="hover:bg-gray-200">
                <button id="copy-link-{{$threadID}}"
                    class="flex py-1 px-4">
                    <img src="{{url('storage/asset/link.svg')}}" class="w-6 h-6 rounded-full">&nbsp;
                     <p class="">Salin link</p>
                     <input type="hidden" value="{{url('thread/'. $threadID)}}" id="link-{{$threadID}}">
                </button>
            </li>
        </ul>
    </div>
</div>

<script>
     var show = false; 

    if(show == false) {
        $('#share-thread-link-{{$threadID}}').hide();
}

    $('#share-thread-{{$threadID}}').click(function() {
        if(show == false) {
            show = true;
            $('#share-thread-link-{{$threadID}}').show();
        }else{
            show = false;
            $('#share-thread-link-{{$threadID}}').hide();
        }    
    });

    $("#copy-link-{{$threadID}}").click(function() {
        document.getElementById("copy-link-{{$threadID}}")
        .onclick = function() {
            let text = document.getElementById("link-{{$threadID}}").value;
            navigator.clipboard.writeText(text)
            .then(() => {
            alert('Text copied to clipboard');
            })
            .catch(err => {
            alert('Error in copying text: ', err);
            });
        }
    });
</script>