@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Books</div>
                <div class="card-body">
                    @foreach($parentBooks as $book)
                        <ul>
                            <li>{{$book->name}}</li>
                            @if(count($book->subset))
                                @include('subSetList',['subsets' => $book->subset])
                            @endif 
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection