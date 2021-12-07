@extends('master')

@section('content')
<!-- <div class="container"> -->
    <div class="row px-3">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">افزودن مقاله جدید</div>
                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="post" class="form-group">
                        @csrf
                        <div class="mb-2">
                            <label class="mb-1" for="title">عنوان مقاله</label>
                            <input type="text" class="form-control" name="title">
                        </div>                        
                        <div class="mb-2">
                            <label class="mb-1" for="body">متن مقاله</label>
                            <textarea name="body" class="form-control" rows="5"></textarea>
                        </div>   
                        <div class="mb-2">
                            <label class="mb-1" for="categories">انتخاب دسته بندی</label>  

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
                    لیست مقالات
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>نام نویسنده</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($posts as $key=>$post)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->User->name }}</td>
                                    <td>
                                        <a href="">
                                            <button class="btn btn-sm btn-info">مشاهده</button>
                                        </a>
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
<!-- </div> -->
@endsection