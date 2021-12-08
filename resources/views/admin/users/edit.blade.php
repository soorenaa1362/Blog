@extends('admin.layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header">ویرایش کاربر</div>
                    <div class="card-body">                    
                        <form action="{{ route('admin.users.update', ['user'=>$user->id]) }}" method="post" class="form-group">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="name" class="mb-1">نام</label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control mb-2">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="mobile" class="mb-1">موبایل</label>
                                    <input type="text" name="mobile" value="{{ $user->mobile }}" class="form-control mb-2">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="role" class="mb-1">نقش کاربری</label>
                                    <select name="role" class="form-control">
                                        <option value="1" <?php if($user->role == 1) echo 'selected'; ?> >
                                            کاربر
                                        </option>
                                        <option value="2" <?php if($user->role == 2) echo 'selected'; ?> >
                                            نویسنده
                                        </option>
                                        <option value="3" <?php if($user->role == 3) echo 'selected'; ?> >
                                            مدیر
                                        </option>                                       
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="status">وضعیت</label>
                                    <select name="status" class="form-control">
                                        <option value="0" <?php if($user->status == 0) echo 'selected' ?> >
                                            غیر فعال
                                        </option>
                                        <option value="1" <?php if($user->status == 1) echo 'selected' ?> >
                                            فعال
                                        </option>
                                    </select>
                                </div>                                
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">ویرایش</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>           
        </div>
    </div>
</div>
@endsection