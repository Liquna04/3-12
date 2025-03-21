@extends('layouts.app')
@section('content')
<h1>This is Category page</h1>
@foreach ($categories as $category)

<li><div>
    {{$category->CategoryName}}
    {{$category->IsVisible}}
   
</div>
<a href="categories/{{$category->CategoryID}}/edit" type="submit">Edit </a>
<form action="/categories/{{$category->CategoryID}}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>
</li>
@endforeach
<a href="categories/create" className="btn btn-primary" role="button">Create new</a>

@endsection