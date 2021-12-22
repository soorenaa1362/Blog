<div id="subset" style="display: none;">
    @foreach($subsets as $subset)
        <!-- <tr data-id="{{$subset->id}}" data-parent="{{$dataParent}}" data-level = "{{$dataLevel + 1}}">
            <td data-column="name"> -->
                <div class="form-check">
                    <input class="form-check-input bks" type="checkbox" name="books[]" id="flexCheckDefault" style="margin-left: 10px;">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{$subset->name}} 
                    </label>
                </div>            
            <!-- </td>
        </tr> -->
        <div id="subset" style="display: none;">
            @if(count($subset->subset))
                @include('accordionSubSet',['subsets' => $subset->subset, 'dataParent' => $subset->id, 'dataLevel' => $dataLevel ])
            @endif
        </div>
    @endforeach
</div>
