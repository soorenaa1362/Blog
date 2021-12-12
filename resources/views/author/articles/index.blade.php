@extends('author.layouts.master')

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
                    <div class="card-header">
                        لیست مطالب ایجاد شده توسط : {{ Auth::user()->name }}
                        <a href="{{ route('author.articles.create') }}" class="btn btn-success">ایجاد مطلب جدید</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>نام مستعار</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ</th>
                                    <th>دسته بندی</th>
                                    <th>تعداد بازدید</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($articles as $key => $article)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ $article->slug }}</td>
                                        <td>
                                            @if($article->status==0)
                                                <span class="text-danger">در انتظار تایید</span>
                                            @else
                                                <span class="text-success">تایید شده</span>
                                            @endif
                                        </td>
                                        <td>{{ jdate($article->created_at)->format('%Y/%m/%d') }}</td>
                                        <td>
                                            @foreach ($article->categories()->pluck('title') as $category)
                                                <span class="text-primary">{{ $category }}</span><br>
                                            @endforeach
                                        </td>
                                        <td>{{ $article->hit }}</td>
                                        <td>
                                            <a href="{{ route('author.articles.edit', ['article' => $article->id]) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('author.articles.destroy', ['article'=>$article->id]) }}"
                                            onclick="return confirm('آیا از حذف این مطلب مطمئن هستید؟')">
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