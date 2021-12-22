@extends('layouts.app')

@section('content')    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Books</div>
                    <div class="card-body">
                        @foreach($parentBooks as $book)
                            <!-- <tr data-id="{{$book->id}}" data-parent="0" data-level="1">
                                <td data-column="name"> -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{$book->name}} <i class="fas fa-angle-down" id="parent"></i>
                                        </label>
                                    </div>                                        
                                <!-- </td>
                            </tr> -->
                            @if(count($book->subset))
                                @include('accordionSubSet',['subsets' => $book->subset, 'dataParent' => $book->id , 'dataLevel' => 1])
                            @endif      
                        @endforeach
                        <hr>
                        <button class="btn btn-primary" id="save">ذخیره</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $(document).on('click', '#parent', function(){
                $("#subset").attr("style", "display:block")
            })
        })
    </script>
@endsection

@section('js')
    <script>
        $(document).ready(function (){
            $(document).on('click', '#save', function(e){                
                e.preventDefault();
                var books=[];
                var count=0;
                $('input.bks:checkbox').each(function () {
                    if(this.checked){
                        count+=1;
                        books.push(this.value);
                    }
                });
                console.log(books);
                if(count<1){
                    alert('لطفا یکی از علایم را انتخاب نمایید');
                }
            })
        })
    </script>
@endsection