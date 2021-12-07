<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>صفحه ورود</title>
</head>
<body>
    <div class="container p-5 mt-4" style="direction: rtl;">   
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <h6 class="text-center">ورود</h6><hr>
                    <div class="card-body">
                        <form action="" method="post" class="form-group">
                            @csrf
                            <label for="mobile" class="mb-1">موبایل</label>
                            <input type="text" name="mobile" class="form-control mb-2">
                            
                            <label for="password" class="mb-1">رمز عبور</label>
                            <input type="password" name="password" class="form-control mb-2">
                            
                            <button class="btn btn-primary mt-3">ورود</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>     
        
    </div>    
</body>
</html>