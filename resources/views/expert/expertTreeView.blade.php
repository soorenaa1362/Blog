@extends('admin.layouts.master')

@section('css')
    <!-- 2 load the theme CSS file -->
    <link rel="stylesheet" href="dist/themes/default/style.css" />
@endsection

@section('content')
    <div class="card-body shadow bg-body rounded">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header">
                        لیست تخصص
                    </div>
                    <div class="card-body">
                        <div id="jstree">
                        @foreach($parentExperts as $expert)
                            <ul>
                                <li>{{$expert->name}}                   
                                    @if(count($expert->subset))
                                        @include('expert.subSetList',['subsets' => $expert->subset])
                                    @endif
                                </li>
                            </ul>
                        @endforeach
                        </div> <!-- jstree -->
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col-md-12 -->
        </div> <!-- row -->
    </div> <!-- card-body shadow -->
@endsection

@section('script')
    <!-- 4 include the jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
    <!-- 5 include the minified jstree source -->
    <script src="dist/jstree.min.js"></script>
    <script>
        // $('button').on('click', function () {            
        $(document).ready(function(){
        
            $('#jstree').jstree({
                "plugins" : [ "wholerow", "checkbox" ]
            });
                        
        });
    </script>
@endsection