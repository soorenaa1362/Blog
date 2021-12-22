@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/tree/tree.css') }}" rel="stylesheet">
@endsection

@section('content')    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Books</div>
                    <div class="card-body">
                        <ul id="myUL">
                            @foreach($parentBooks as $book)
                                <li>
                                    <span class="caret"></span>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{$book->name}}
                                        </label>
                                    </div>     
                                    
                                    @if(count($book->subset))
                                        <ul class="nested"> 
                                            @include('tree.subSetView',['subsets' => $book->subset, 'dataParent' => $book->id , 'dataLevel' => 1])
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection

@section('js')
    <script>
        var toggler = document.getElementsByClassName("caret");
        var i;

        for (i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function() {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        } 
    </script>
@endsection