@foreach($subsets as $subset)
    <ul>
        <li>{{$subset->name}}</li> 
        @if(count($subset->subset))
            @include('subSetList',['subsets' => $subset->subset])
        @endif
    </ul> 
@endforeach