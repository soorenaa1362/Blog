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
                    <div class="card-header">ایجاد مطلب جدید</div>
                    <div class="card-body">
                        <form action="{{ route('admin.articles.store') }}" method="post" class="form-group">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="title" class="mb-1">عنوان</label>
                                    <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>                                
                                <div class="col-md-6 mb-2">
                                    <label for="active" class="mb-1">وضعیت</label>
                                    <select name="active" class="form-control">
                                        <option value="0">
                                            منتشر نشده
                                        </option>
                                        <option value="1">
                                            منتشر شده
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="text" class="mb-1">توضیحات</label>
                                    <textarea name="text" class="form-control @error('text') is-invalid @enderror">
                                        
                                    </textarea>
                                </div>
                                @error('text')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">ثبت</button>
                                    <a href="{{ route('admin.articles.index') }}" class="btn btn-success">برگشت به لیست</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection