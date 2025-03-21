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
        <h2 class="mb-4">Create productattribute</h2>
        <form action="/productattributes" method="post">
            @csrf
            <div class="mb-3">
                <label for="AttributeName" class="form-label">Attribute name</label>
                <input type="text" class="form-control" id="AttributeName" name="AttributeName" placeholder="Type AttributeName" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Gửi</button>
        </form>
    </div>
</body>
</html>
@endsection