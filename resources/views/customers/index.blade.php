@extends('layouts.app')
@section('content')
<h1>This is customers page</h1>

@foreach ($customers as $customer)

<li><div>
    {{$customer->CustomerID}}
    {{$customer->full_name}}
    {{$customer->email}}
    {{$customer->phone}}
    {{$customer->password_hash}}
    {{$customer->gender}}

    {{$customer->address}}
    
    
    {{$customer->created_at}}
    {{$customer->updated_at}}
</div>
<a href="customers/{{$customer->CustomerID}}/edit" type="submit">Edit </a>
<form action="/customers/{{$customer->CustomerID}}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>
</li>
@endforeach

<a href="customers/create" className="btn btn-primary" role="button">Create new</a>

@endsection