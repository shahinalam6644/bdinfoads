@foreach($ads as $ad)
    @if($ad->date == now()->toDateString() && $ad->status == 1)
        <a href="https://google.com/" ><img src="{{ $ad->thumbnail_path }}" style="width: 100%;height: auto;" /> </a>
    @endif
@endforeach

@foreach($ads as $ad)
    @if($ad->date == "2022-01-01" && $ad->status == 1)
        <a href="https://google.com/" ><img src="{{ $ad->thumbnail_path }}" style="width: 100%;height: auto;" /> </a>
    @endif
@endforeach