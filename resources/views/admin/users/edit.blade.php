@extends('admin.layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header">ویرایش کاربر</div>
                    <div class="card-body">                    
                        <form action="{{ route('admin.user.update') }}" method="post" class="form-group">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="name" class="mb-1">نام</label>
                                    <input type="text" value="{{ $user->name }}" class="form-control mb-2" disabled>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="mobile" class="mb-1">موبایل</label>
                                    <input type="text" value="{{ $user->mobile }}" class="form-control mb-2" disabled>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="category_id" class="mb-1">نقش کاربری</label>
                                    <select name="category_id" class="form-control">
                                        <option value="1">کاربر عادی</option>
                                        <option value="1">نویسنده</option>
                                        <option value="1">مدیر</option>                                        
                                    </select>
                                </div>
                                
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">ذخیره</button>
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