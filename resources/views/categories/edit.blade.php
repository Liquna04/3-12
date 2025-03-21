@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
        <h2 class="mb-4">Nhập Thông Tin</h2>
        <form action="/categories/{{$category ->CategoryID}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="CategoryName" class="form-label">CategoryName</label>
                <input type="text" class="form-control" id="CategoryName" name="CategoryName" placeholder="Type CategoryName" required>
            </div>
            <div class="mb-3">
                <label for="IsVisible" class="form-label">IsVisible</label>
                <input type="text" class="form-control" id="IsVisible" name="IsVisible" placeholder="Type IsVisible" required>
            </div>
            <button type="submit" class="btn btn-primary">Gửi</button>
        </form>
    </div>
</body>
</html>
@endsection