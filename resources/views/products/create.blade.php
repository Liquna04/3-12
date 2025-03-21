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
        <h2 class="mb-4">Create product</h2>
        <form action="/products" method="post">
            @csrf
            <div class="form-group row mb-3">
                            <label for="Name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="Name" type="text" class="form-control @error('Name') is-invalid @enderror" name="Name" value="{{ isset($product) ? $product->Name : old('Name') }}" required maxlength="100">
                                @error('Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="Description" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <textarea id="Description" class="form-control @error('Description') is-invalid @enderror" name="Description" rows="4">{{ isset($product) ? $product->Description : old('Description') }}</textarea>
                                @error('Description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="Price" class="col-md-4 col-form-label text-md-right">Price</label>
                            <div class="col-md-6">
                                <input id="Price" type="number" step="0.01" class="form-control @error('Price') is-invalid @enderror" name="Price" value="{{ isset($product) ? $product->Price : old('Price') }}">
                                @error('Price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="Stock" class="col-md-4 col-form-label text-md-right">Stock</label>
                            <div class="col-md-6">
                                <input id="Stock" type="number" class="form-control @error('Stock') is-invalid @enderror" name="Stock" value="{{ isset($product) ? $product->Stock : old('Stock') }}">
                                @error('Stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="CategoryID" class="col-md-4 col-form-label text-md-right">Category</label>
                            <div class="col-md-6">
                                <select id="CategoryID" class="form-control @error('CategoryID') is-invalid @enderror" name="CategoryID">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->CategoryID }}" {{ (isset($product) && $product->CategoryID == $category->CategoryID) ? 'selected' : (old('CategoryID') == $category->CategoryID ? 'selected' : '') }}>
                                            {{ $category->CategoryName }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('CategoryID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group row mb-3">
                            <label for="ImageURL" class="col-md-4 col-form-label text-md-right">Product ImageURL</label>
                            <div class="col-md-6">
                                <input id="ImageURL" type="file" class="form-control @error('ImageURL') is-invalid @enderror" name="ImageURL">
                                @if(isset($product) && $product->ImageURL_url)
                                    <div class="mt-2">
                                        <img src="{{ asset($product->ImageURL_url) }}" alt="{{ $product->name }}" style="max-width: 100px;">
                                    </div>
                                @endif
                                @error('ImageURL')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->

                        <div class="form-group row mb-3">
                            <label for="IsVisible" class="col-md-4 col-form-label text-md-right">Visibility</label>
                            <div class="col-md-6 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="IsVisible" id="IsVisible" value="1" {{ (isset($product) && $product->IsVisible) || old('IsVisible') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="IsVisible">
                                        Product is visible to customers
                                    </label>
                                </div>
                                @error('IsVisible')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="SalesCount" class="col-md-4 col-form-label text-md-right">SalesCount</label>
                            <div class="col-md-6">
                                <input id="SalesCount" type="number" step="0.01" class="form-control @error('SalesCount') is-invalid @enderror" name="SalesCount" value="{{ isset($product) ? $product->SalesCount : old('SalesCount') }}">
                                @error('SalesCount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($product) ? 'Update Product' : 'Add Product' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
</body>
</html>
@endsection