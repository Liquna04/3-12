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
        <form action="/customers/{{$customer ->CustomerID}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group row mb-3">
                            <label for="full_name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ isset($customer) ? $customer->full_name : old('full_name') }}" required maxlength="100">
                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">email</label>
                            <div class="col-md-6">
                                <textarea id="email" class="form-control @error('email') is-invalid @enderror" name="email" rows="4">{{ isset($customer) ? $customer->email : old('email') }}</textarea>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">phone</label>
                            <div class="col-md-6">
                                <input id="phone" type="number"  class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ isset($customer) ? $customer->phone : old('phone') }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password_hash" class="col-md-4 col-form-label text-md-right">password_hash</label>
                            <div class="col-md-6">
                                <input id="password_hash" type="number" class="form-control @error('password_hash') is-invalid @enderror" name="password_hash" value="{{ isset($customer) ? $customer->password_hash : old('password_hash') }}">
                                @error('password_hash')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                            
                

                        <!-- <div class="form-group row mb-3">
                            <label for="profile_picture" class="col-md-4 col-form-label text-md-right">customer profile_picture</label>
                            <div class="col-md-6">
                                <input id="profile_picture" type="file" class="form-control @error('profile_picture') is-invalid @enderror" name="profile_picture">
                                @if(isset($customer) && $customer->profile_picture_url)
                                    <div class="mt-2">
                                        <img src="{{ asset($customer->profile_picture_url) }}" alt="{{ $customer->name }}" style="max-width: 100px;">
                                    </div>
                                @endif
                                @error('profile_picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->

                        <div class="form-group row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                            <div class="col-md-6 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="gender" id="gender" value="1" {{ (isset($customer) && $customer->gender) || old('gender') ? 'checked' : '' }}>
                                    
                                </div>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($customer) ? 'Update customer' : 'Add customer' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
</body>
</html>
@endsection
