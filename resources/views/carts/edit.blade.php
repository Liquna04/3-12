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
        <h2 class="mb-4">Edit information </h2>
        <form action="/carts/{{$cart ->CartID}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="Quantity" class="form-label">Quantity</label>
                <input type="text" class="form-control" id="Quantity" name="Quantity" placeholder="Type Quantity" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
@endsection