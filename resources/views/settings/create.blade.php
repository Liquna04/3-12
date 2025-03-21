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
        <h2 class="mb-4">Create cart</h2>
        <form action="/settings" method="post" enctype="multipart/form-data">
            @csrf

            <div>
                <input type="file" name="banner" class="form-control" id="banner" required>
            </div>
            <div>
                <input type="file" name="banners[]" multiple class="form-control" id="banners[]" required>
            </div>
            <div>
                <input type="text" name="" class="form-control" id="Quantity" placeholder="Type Quantity" required>
            </div>
            <button type="submit" class="btn btn-primary">Gửi</button>
        </form>
    </div>
</body>
</html>
@endsection