@extends('layouts.app')
@section('content')
<h1>This is productattributes page</h1>
@foreach ($productattributes as $productattribute)

<li><div>{{$productattribute->AttributeName}}
</div>
<a href="productattributes/{{$productattribute->AattributeID}}/edit" type="submit">Edit </a>
<form action="/productattributes/{{$productattribute->AttributeID}}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>
</li>
@endforeach
<a href="productattributes/create" className="btn btn-primary" role="button">Create new</a>

@endsection