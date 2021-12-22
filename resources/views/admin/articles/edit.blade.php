@extends('admin.layouts.master')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
@endsection

@section('content')
<div class="card shadow bg-body rounded">
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
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header">ویرایش مطلب</div>
                    <div class="card-body">
                        <form action="{{ route('admin.articles.update', ['article'=>$article->id]) }}" method="post" class="form-group">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="title" class="mb-1">عنوان</label>
                                    <input type="text" name="title" value="{{ $article->title }}"
                                    class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>  
                                <div class="col-md-3 mb-2">
                                    <label for="slug" class="mb-1">نام مستعار</label>
                                    <input type="text" name="slug" value="{{ $article->slug }}"
                                    class="form-control @error('slug') is-invalid @enderror">
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="categories" class="mb-1 @error('categories') is-invalid @enderror">دسته بندی</label>
                                    <select id="choices-multiple-remove-button" 
                                    placeholder="انتخاب دسته بندی" name="categories[]" multiple>
                                        @foreach ($categories as $cat_id => $cat_title)
                                            <option value="{{ $cat_id }}"
                                                <?php 
                                                    if(in_array($cat_id, $article->categories->pluck('id')->toArray()))
                                                        echo 'selected'
                                                ?>
                                            >
                                                {{ $cat_title }}
                                            </option>
                                        @endforeach                                        
                                    </select>
                                    @error('categories')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="status" class="mb-1">وضعیت</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="0" <?php if($article->status == 0) echo 'selected'; ?> >                                            
                                            در انتظار تایید
                                        </option>
                                        <option value="1" <?php if($article->status == 1) echo 'selected'; ?> >
                                            تایید شده
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="text" class="mb-1">محتوای مطلب</label>
                                    <textarea name="text" id="ckeditor" class="form-control @error('text') is-invalid @enderror">
                                        {{ $article->text }}
                                    </textarea>
                                </div>
                                @error('text')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
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

<script>
    $(document).ready(function(){
        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount:5,
            searchResultLimit:5,
            renderChoiceLimit:5
        });
    });
</script>

<script>
    ClassicEditor.create(document.getElementById('ckeditor'))
</script>

@endsection