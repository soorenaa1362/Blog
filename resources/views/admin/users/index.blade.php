@extends('admin.layouts.master')

@section('content')

@if(session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-danger mt-2">
        {{ session('warning') }}
    </div>
@endif

<div class="card shadow bg-body rounded">
    <!-- <h5 class="mt-3 mx-5">مدیریت کاربران</h5> -->
    <div class="card-body">
        <div class="row">            
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header">لیست کاربران</div>
                    <div class="card-body">                    
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>موبایل</th>
                                    <th>نقش</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($users as $key=>$user )
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            @if($user->id == Auth::user()->id)
                                                <span class="text-primary">{{ $user->name }} (خودم)</span>
                                            @else   
                                                {{ $user->name }}
                                            @endif
                                        </td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>
                                            @if($user->role == 1)    
                                                کاربر
                                            @elseif ($user->role == 2)
                                                نویسنده
                                            @else
                                                مدیر
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->status == 0)
                                                <span style="color: #e63946;">غیر فعال</span>
                                            @else
                                                <span style="color: #2a9d8f;">فعال</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.users.show', ['user'=>$user->id]) }}">
                                                <i class="fas fa-file-alt"></i>
                                            </a>
                                            <a href="{{ route('admin.users.edit', ['user'=>$user->id]) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @if(Auth::user()->id != $user->id)
                                                <a href="{{ route('admin.users.destroy', ['user'=>$user->id]) }}"
                                                onclick="return confirm('آیا از حذف این کاربر مطمئن هستید؟')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            @endif
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