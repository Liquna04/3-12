@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Create New Sales Report</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('salesreports.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="ProductID">Product</label>
                            <select name="ProductID" id="ProductID" class="form-control @error('ProductID') is-invalid @enderror" required>
                                <option value="">Select a product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->ProductID }}" {{ old('ProductID') == $product->ProductID ? 'selected' : '' }}>
                                        {{ $product->ProductName }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ProductID')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="QuantitySold">Quantity Sold</label>
                            <input type="number" name="QuantitySold" id="QuantitySold" class="form-control @error('QuantitySold') is-invalid @enderror" value="{{ old('QuantitySold') }}" required>
                            @error('QuantitySold')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="TotalSales">Total Sales</label>
                            <input type="number" name="TotalSales" id="TotalSales" class="form-control @error('TotalSales') is-invalid @enderror" value="{{ old('TotalSales') }}" required step="0.01">
                            @error('TotalSales')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Create Report</button>
                            <a href="{{ route('salesreports.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection