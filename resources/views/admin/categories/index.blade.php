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
                    <div class="card-header">افزودن دسته بندی</div>
                    <div class="card-body">
                        <form action="{{ route('admin.categories.store') }}" method="post" class="form-group">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="title" class="mb-1">عنوان</label>
                                    <input type="text" name="title" 
                                    class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>                                                               
                                <div class="col-md-12 mb-2">
                                    <label for="slug" class="mb-1">نام مستعار</label>
                                    <input type="text" name="slug" 
                                    class="form-control @error('slug') is-invalid @enderror">
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="active" class="mb-1">وضعیت</label>
                                    <select name="active" class="form-control @error('active') is-invalid @enderror">
                                        <option value="" selected>----</option>
                                        <option value="0">غیرفعال</option>
                                        <option value="1">فعال</option>
                                    </select>
                                    @error('active')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>  
                                <div class="col-md-4">
                                    <button class="btn btn-primary">ذخیره</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-2">
                <div class="card">
                    <div class="card-header">لیست دسته بندی ها</div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>آیدی</th>
                                    <th>عنوان</th>
                                    <th>نام مستعار</th>
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
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            @if ($category->active == 0)
                                                <span class="text-danger">غیر فعال</span>
                                            @else
                                                <span class="text-success">فعال</span>
                                            @endif
                                        </td>
                                        <td>                                            
                                            <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.categories.destroy', ['category'=>$category->id]) }}"
                                            onclick="return confirm('آیا از حذف این کاربر مطمئن هستید؟')">
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