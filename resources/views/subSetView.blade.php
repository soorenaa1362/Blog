@foreach($subsets as $subset)
    <tr data-id="{{$subset->id}}" data-parent="{{$dataParent}}" data-level = "{{$dataLevel + 1}}">
        <td data-column="name">
            <div class="form-check">
                <input class="form-check-input bks" type="checkbox" name="books[]" id="flexCheckDefault" style="margin-left: 10px;">
                <label class="form-check-label" for="flexCheckDefault">
                    <h6 style="cursor: pointer;">{{$subset->name}}</h6>
                </label>
            </div>            
        </td>
    </tr>
    @if(count($subset->subset))
        @include('subSetView',['subsets' => $subset->subset, 'dataParent' => $subset->id, 'dataLevel' => $dataLevel])
    @endif
@endforeach