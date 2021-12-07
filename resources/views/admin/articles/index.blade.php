@extends('admin.layouts.master')

@section('content')
<div class="card">
    <h5 class="mt-3 mx-5">مدیریت مطالب</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header">افزودن مطلب</div>
                    <div class="card-body">                    
                        <form action="" method="post" class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="title" class="mb-1">عنوان مطلب</label>
                                    <input type="text" name="name" class="form-control mb-2">
                                </div>                                
                                <div class="col-md-3 mb-2">
                                    <label for="category_id" class="mb-1"> انتخاب دسته بندی</label>
                                    <select name="category_id" class="form-control">
                                        <option value="1">وب</option>
                                        <option value="2">موبایل</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="category_id" class="mb-1">انتخاب زیر دسته</label>
                                    <select name="category_id" class="form-control">
                                        <option value="1">php</option>
                                        <option value="1">asp</option>
                                        <option value="1">laravel</option>
                                        <option value="1">nodejs</option>
                                        <option value="2">android</option>
                                        <option value="2">catlin</option>
                                        <option value="2">swift</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="text" class="mb-1">متن</label>
                                    <textarea name="text" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary">ذخیره</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header">لیست مطالب</div>
                    <div class="card-body">                    
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>نویسنده</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection