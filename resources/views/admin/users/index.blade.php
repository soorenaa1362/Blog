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

<div class="card">
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
                                        <td>{{ $user->name }}</td>
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
                                            <a href="{{ route('admin.users.edit', ['user'=>$user->id]) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.users.destroy', ['user'=>$user->id]) }}">
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
            <!-- <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">ویرایش کاربر</div>
                    <div class="card-body">                    
                        <form action="" method="post" class="form-group">
                            <label for="name" class="mb-1">نام</label>
                            <input type="text" class="form-control" value="{{ $user->name ?? '' }}" disabled> <br>
                            
                            <label for="mobile" class="mb-1">موبایل</label>
                            <input type="text" class="form-control" value="{{ $user->mobile ?? '' }}" disabled> <br>
                            
                            <label for="role" class="mb-1">نقش کاربری</label>
                            <select name="role" class="form-control">
                                <option value="1">کاربر عادی</option>
                                <option value="2">نویسنده</option>
                                <option value="3">ادمین</option>
                            </select>

                            <button class="btn btn-success mt-3">ویرایش</button>
                        </form>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection