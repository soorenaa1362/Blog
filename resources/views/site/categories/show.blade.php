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
            @foreach ($articles as $article) 
                @if ($article->text != null)                                    
                    <div class="card shadow bg-body rounded mb-2">
                        <div class="card-header">{{ $article->title }}</div>  
                        <div class="card-body">
                            <!-- {{ $article->text }}              -->
                            <?php echo mb_substr(strip_tags($article->text),0,200,'UTF8').'...'; ?>
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2 mb-2">
                                <a href="{{ route('site.articles.show', ['article'=>$article->slug]) }}" class="text-success">ادامه مطلب</a>                    
                                </div>
                            </div>
                        </div>
                    </div>            
                @endif 
            @endforeach
        </div>
    </div>
</div>
@endsection