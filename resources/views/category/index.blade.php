@extends('master')

@section('content')
<div class="container">
    <div class="row px-3">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">افزودن دسته بندی جدید</div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="post" class="form-group">
                        @csrf
                        <div class="mb-2">
                            <label for="title" class="mb-2">عنوان دسته بندی</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="mb-2" style="text-align: left;">
                            <button type="submit" class="btn btn-primary">ذخیره</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    لیست دسته بندی ها
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>                                
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($categories as $key=>$category) 
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>
                                        <a href="">
                                            <button class="btn btn-sm btn-success">ویرایش</button>
                                        </a>
                                        <a href="">
                                            <button class="btn btn-sm btn-danger">حذف</button>
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
@endsection