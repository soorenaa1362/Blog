@extends('author.layouts.master')

@section('content')
<div class="card p-2">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">مشخصات ثبت شده در سیستم</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 px-5 mb-3">
                                <span class="text-primary">نام : {{ $user->name }}</span>
                            </div>
                            <div class="col-md-4 px-5 mb-3">
                                <span class="text-success">موبایل : {{ $user->mobile }}</span>
                            </div>
                            <div class="col-md-4 px-5 mb-3">
                                @if($user->role == 2)
                                    <span class="text-info">نقش کاربری : نویسنده</span>
                                @endif
                            </div>
                            <div class="col-md-4 px-5 mb-3">
                                <span class="text-danger">تاریخ ثبت نام : {{ jdate($user->created_at)->format('%d-%B-%Y') }}</span>
                            </div>
                            <div class="col-md-4 px-5 mb-3">
                                <span class="text-primary">تعداد مطالب ایجاد شده : {!! count($articles) !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">لیست مطالب</div>
                    <div class="card-body">
                    <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>نام مستعار</th>
                                    <th>وضعیت</th>
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
                                                <span class="text-danger">منتشر نشده</span>
                                            @else
                                                <span class="text-success">منتشر شده</span>
                                            @endif
                                        </td>
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
                                            <a href="{{ route('admin.articles.destroy', ['article' => $article->id]) }}"
                                            onclick="confirm('آیا از حذف این مطلب مطمئن هستید ؟')">
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