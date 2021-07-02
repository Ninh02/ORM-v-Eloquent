<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Cập nhật thông tin tỉnh thành</h1>
        </div>
        <div class="col-12">
            <form method="post" action="{{route('cities.update', $city->id)}}">
                @csrf
                <div class="form-group">
                    <label>Tên tỉnh</label>
                    <input type="text" class="form-control" name="name" value="{{ $city->name }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
