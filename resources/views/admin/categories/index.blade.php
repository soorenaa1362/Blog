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
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">افزودن دسته</div>
                    <div class="card-body">
                        <form action="{{ route('admin.categories.store') }}" method="post" class="form-group">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="title" class="mb-1">عنوان</label>
                                    <input type="text" name="title" 
                                    class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>                                
                                <div class="col-md-12 mb-2">
                                    <label for="active" class="mb-1">وضعیت</label>
                                    <select name="active" class="form-control">
                                        <option value="0">منتشر نشده</option>
                                        <option value="1">منتشر شده</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="description" class="mb-1">توضیحات</label>
                                    <textarea name="description" 
                                        class="form-control @error('description') is-invalid @enderror" rows="3">
                                    </textarea>
                                </div>
                                @error('description')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                                <div class="col-md-4">
                                    <button class="btn btn-primary">ثبت</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-2">
                <div class="card">
                    <div class="card-header">لیست مطالب</div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>آیدی</th>
                                    <th>عنوان</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($categories as $key=>$category )
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->active }}</td>
                                        <td>
                                            <a href="{{ route('admin.categories.show', ['category' => $category->id]) }}">
                                                <i class="fas fa-file-alt"></i>
                                            </a>
                                            <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.categories.destroy', ['category' => $category->id]) }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection