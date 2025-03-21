@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Product Attribute Value</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('product-attribute-values.update', $attributeValue->ValueID) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="attributeID">Product Attribute</label>
                            <select class="form-control @error('attributeID') is-invalid @enderror" id="attributeID" name="attributeID" required>
                                <option value="">Select Product Attribute</option>
                                @foreach($productAttributes as $attribute)
                                    <option value="{{ $attribute->AttributeID }}" {{ (old('attributeID') ?? $attributeValue->AttributeID) == $attribute->AttributeID ? 'selected' : '' }}>
                                        {{ $attribute->Name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('attributeID')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="value">Value</label>
                            <input type="text" class="form-control @error('value') is-invalid @enderror" id="value" name="value" value="{{ old('value') ?? $attributeValue->Value }}" required>
                            @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                            <a href="{{ route('product-attribute-values.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection