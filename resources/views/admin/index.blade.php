@extends('admin.layouts.master')

@section('content')
<div class="card shadow bg-body rounded p-2">
    <!-- <div class="card-header">داشبورد</div> -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">کاربران</div>
                    <div class="card-body">
                        <i class="fas fa-users text-success" style="font-size: 22px;"></i>
                        <span class="text-success">
                            کل کاربران :  {!! count($allUsers) !!} کاربر
                        </span>
                        <hr>
                        <i class="fas fa-user-edit text-primary" style="font-size: 22px;"></i>
                        <span class="text-primary">
                            کاربر نویسنده :  {!! count($author) !!} کاربر
                        </span>
                        <br>
                        <i class="fas fa-user-alt text-primary" style="font-size: 22px;"></i>
                        <span class="text-primary">
                            کاربر عادی :  {!! count($users) !!} کاربر
                        </span>    
                    </div>
                </div>
            </div> 
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">مطالب</div>
                    <div class="card-body">
                        <i class="fas fa-book text-success" style="font-size: 22px;"></i>
                        <span class="text-success">
                            کل مطالب :  {!! count($allArticles) !!} عدد
                        </span>
                        <hr>
                        <i class="fas fa-file-alt text-primary" style="font-size: 22px;"></i>
                        <span class="text-primary">
                            منتشر شده :  {!! count($articleStatus1) !!} عدد
                        </span>
                        <br>
                        <i class="fas fa-file text-primary" style="font-size: 22px;"></i>
                        <span class="text-primary">
                            در انتظار تایید :  {!! count($articleStatus0) !!} کاربر
                        </span> 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        لیست مطالب منتظر تایید
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>نویسنده</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($articleStatus0 as $key => $Status0)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $Status0->title }}</td>
                                        <td>{{ $Status0->User->name }}</td>                                        
                                        <td>
                                            <a href="{{ route('admin.articles.edit', ['article' => $Status0->id]) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.articles.destroy', ['article' => $Status0->id]) }}"
                                            onclick="return confirm('آیا از حذف این مطلب مطمئن هستید ؟')">
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        لیست مطالب تایید شده
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>نویسنده</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($articleStatus1 as $key => $Status1)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $Status1->title }}</td>
                                        <td>{{ $Status1->User->name }}</td>                                        
                                        <td>
                                            <a href="{{ route('admin.articles.edit', ['article' => $Status1->id]) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.articles.destroy', ['article' => $Status1->id]) }}"
                                            onclick="return confirm('آیا از حذف این مطلب مطمئن هستید ؟')">
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