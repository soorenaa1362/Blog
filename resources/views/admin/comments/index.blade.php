@extends('admin.layouts.master')

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
                    <div class="card-header">
                        لیست نظرات                        
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>خلاصه نظر</th>
                                    <th>نویسنده</th>
                                    <th>برای مطلب</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach ($comments as $key=>$comment)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <?php echo mb_substr(strip_tags($comment->text),0,200,'UTF8').'...'; ?>
                                    </td>
                                    <td>{{ $comment->name }}</td>
                                    <td>{{ $comment->article->id }}</td>
                                    <td>{{ $comment->status }}</td>
                                    <td>
                                        <a href="{{ route('admin.comments.edit', ['comment' => $comment->id]) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.comments.destroy', ['comment' => $comment->id]) }}"
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