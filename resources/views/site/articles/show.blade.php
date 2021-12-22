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
            <div class="card shadow bg-body rounded mb-3">
                <div class="card-header">دسته بندی ها</div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($categories as $category)
                        <div class="col-md-12 p-2 mb-1">
                            <a href="{{ route('site.categories.show', ['category'=>$category->slug]) }}" class="text-success">
                                {{ $category->title }}
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @if($article->text != null)
                <div class="card shadow bg-body rounded mb-2">
                    <div class="card-header">{{ $article->title }}</div>  
                    <div class="card-body">
                        {!! ($article->text) !!}
                        <div class="row p-2 mt-5" style="background-color: #2a9d8f;">
                            <div class="col-md-9">
                                <!-- <ul> -->
                                    <span class="text-white">
                                        نویسنده : {{ $article->User->name }} |
                                    </span>
                                    <span class="text-white">
                                        تاریخ انتشار : {!! jdate($article->created_at)->format('%Y/%m/%d') !!} |
                                    </span>
                                    <span class="text-white">
                                        تعداد بازدید : {{ $article->hit }}
                                    </span>
                                <!-- </ul> -->
                            </div>
                            <div class="col-md-3 mt-4">
                                <a href="{{ route('site.index') }}" class="text-white">
                                    بازگشت به صفحه ی قبل
                                </a>
                            </div>
                        </div>
                    </div>             
                </div>
            @endif

            <div class="card">
                <div class="card-header">نظرات</div>
                <div class="card-body">
                    
                </div>
                <div class="card m-2">
                    <div class="card-body">                
                        <form class="row form-group" action="{{ route('admin.comments.store', ['article'=>$article->id]) }}" method="post">
                            @csrf
                            <div class="col-md-6 mb-3">
                                <label for="name">نام</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">ایمیل</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="text">متن نظر شما</label>
                                <textarea name="text" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-success" value="ارسال نظر">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection