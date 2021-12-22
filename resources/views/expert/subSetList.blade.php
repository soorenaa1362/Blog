



@foreach($subsets as $subset)
    <ul>
        <li>{{$subset->name}}
            @if(count($subset->subset))
                @include('expert.subSetList',['subsets' => $subset->subset])
            @endif
        </li>
    </ul> 
@endforeach
