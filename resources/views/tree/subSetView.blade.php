@foreach($subsets as $subset)
    <li>
        <span class="caret"></span>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                {{$subset->name}}
            </label>
        </div>             
        @if(count($subset->subset))
            <ul class="nested"> 
                @include('tree.subSetView',['subsets' => $subset->subset, 'dataParent' => $subset->id, 'dataLevel' => $dataLevel ])
            </ul>
        @endif
    </li>
@endforeach

