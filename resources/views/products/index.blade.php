@extends('layouts.app')
@section('content')
<h1>This is products page</h1>
@foreach ($categories as $category)
@foreach ($products as $product)

<li><div>
    {{$product->ProductID}}
    {{$product->Name}}
    {{$product->Description}}
    {{$product->Price}}
    {{$product->Stock}}
    {{$product->CategoryID}}

    {{$product->ImageURL}}
    {{$product->IsVisible}}
    {{$product->SalesCount}}
    {{$product->CreatedAt}}
    {{$product->UpdatedAt}}
</div>
<a href="products/{{$product->ProductID}}/edit" type="submit">Edit </a>
<form action="/products/{{$product->ProductID}}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>
</li>
@endforeach
@endforeach
<a href="products/create" className="btn btn-primary" role="button">Create new</a>

@endsection