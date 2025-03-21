@extends('layouts.app')
@section('content')
<h1>This is settings page</h1>
@foreach ($settings as $setting)

<li><div>
    {{$setting->settingID}}
    {{$setting->banner}}
    
    <img src="{{ asset('banner/' . $setting->banner) }}" class="img-responsive" alt="">
</div>
<a href="settings/{{$setting->settingID}}/edit" type="submit">Edit </a>
<form action="/settings/{{$setting->settingID}}" method="post">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>
</li>
@endforeach
<a href="settings/create" className="btn btn-primary" role="button">Create new</a>

@endsection