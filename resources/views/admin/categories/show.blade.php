@extends('admin.layouts.master')

@section('content')
<div class="card">
    @if (session('success'))
        <div class="alert alert-success m-2">
            {{ session('success') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-danger m-2">
            {{ session('warning') }}
        </div>
    @endif
    <!-- <h5 class="mt-3 mx-5">مدیریت دسته ها</h5> -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header">نمایش دسته</div>
                    <div class="card-body">
                        <!-- <form action="" method="post" class="form-group"> -->
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="title" class="mb-1">عنوان</label>
                                    <input type="text" class="form-control" value="{{ $category->title }}" disabled>
                                </div>                                
                                <div class="col-md-6 mb-2">
                                    <label for="active" class="mb-1">وضعیت</label>
                                    <input type="text" class="form-control" value="{{ $category->active }}" disabled>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="description" class="mb-1">توضیحات</label>
                                    <textarea name="description" class="form-control" disabled>
                                        {{ $category->description }}
                                    </textarea>
                                </div>
                                @error('description')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                <div class="col-md-4">
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-success">برگشت به لیست</a>
                                </div>
                            </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection