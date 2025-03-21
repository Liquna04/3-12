@extends('layouts.app')
@section('content')
<h1>This is Carts page</h1>
@foreach ($carts as $cart)

<li><div>
    {{$cart->CartID}}
    {{$cart->CustomerID}}
    {{$cart->ProductID}}
    {{$cart->Quantity}}
    {{$cart->CreatedAt}}
    {{$cart->UpdatedAt}}
</div>
<a href="carts/{{$cart->CartID}}/edit" type="submit">Edit </a>
<form action="/carts/{{$cart->CartID}}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>
</li>
@endforeach
<a href="carts/create" className="btn btn-primary" role="button">Create new</a>

@endsection