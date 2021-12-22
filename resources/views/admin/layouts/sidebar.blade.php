<div class="card shadow bg-body rounded p-2 mb-2">
    <!-- <div class="card-header">منوی اصلی</div> -->
    <div class="alert alert-primary">منوی اصلی (پنل ادمین)</div>
    <div class="card-body">
        <div class="nav">
            <ul>
                <li class="mb-3">
                    <a href="{{ route('admin.dashboard') }}">داشبورد</a>
                </li>
                
                <li class="mb-3">
                    <a href="{{ Route('admin.users.index') }}">مدیریت کاربران</a>
                </li>

                <li class="mb-3">
                    <a href="{{ route('admin.categories.index') }}">مدیریت دسته ها</a>
                </li>

                <li class="mb-3">
                    <a href="{{ route('admin.articles.index') }}">مدیریت مطالب</a>
                </li> 
                
                <li class="mb-3">
                    <a href="{{ route('admin.comments.index') }}">مدیریت نظرات</a>
                </li> 
                
            </ul>
        </div>
    </div>
</div>