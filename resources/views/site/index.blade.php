@extends('master')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success m-2">
            {{ session('success') }}
        </div>
    @endif        
    <div class="row px-3">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header">دسته بندی ها</div>
                
            </div>
        </div>
        <div class="col-md-8">
            
        </div>
    </div>
</div>
@endsection