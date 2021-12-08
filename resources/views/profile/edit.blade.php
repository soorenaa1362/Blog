@extends('profile.layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header">ویرایش پروفایل کاربری</div>
                    <div class="card-body">                    
                        <form action="{{ route('profile.update', ['user'=>$user->id]) }}" method="post" class="form-group">
                            @csrf
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="name" class="mb-1">نام</label>
                                    <input type="text" name="name" value="{{ $user->name }}" 
                                    class="form-control mb-2 @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="mobile" class="mb-1">موبایل</label>
                                    <input type="text" name="mobile" value="{{ $user->mobile  }}" 
                                    class="form-control mb-2 @error('mobile') is-invalid @enderror">
                                    @error('mobile')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="mobile" class="mb-1">رمز عبور</label>
                                    <input type="text" name="password" class="form-control mb-2">
                                    @error('password')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="mobile" class="mb-1">تکرار رمز عبور</label>
                                    <input type="text" name="password_confirmation" class="form-control mb-2">
                                </div>
                                
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">ویرایش پروفایل</button>
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



