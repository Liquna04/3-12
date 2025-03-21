@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Shipping Address</h5>
                        <a href="{{ route('shipping-addresses.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
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

                    <form action="{{ route('shipping-addresses.update', $shippingAddress->AddressID) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label for="CustomerID">Customer <span class="text-danger">*</span></label>
                            <select class="form-control @error('CustomerID') is-invalid @enderror" id="CustomerID" name="CustomerID" required>
                                <option value="">Select Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->CustomerID }}" {{ old('CustomerID', $shippingAddress->CustomerID) == $customer->CustomerID ? 'selected' : '' }}>
                                        {{ $customer->Name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="LocationName">Location Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('LocationName') is-invalid @enderror" id="LocationName" 
                                name="LocationName" value="{{ old('LocationName', $shippingAddress->LocationName) }}" required maxlength="100">
                            <small class="form-text text-muted">E.g., Home, Office, Warehouse</small>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="Email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('Email') is-invalid @enderror" id="Email" 
                                name="Email" value="{{ old('Email', $shippingAddress->Email) }}" required maxlength="100">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="Phone">Phone <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control @error('Phone') is-invalid @enderror" id="Phone" 
                                name="Phone" value="{{ old('Phone', $shippingAddress->Phone) }}" required maxlength="15">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="Address">Address <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('Address') is-invalid @enderror" id="Address" 
                                name="Address" required maxlength="255">{{ old('Address', $shippingAddress->Address) }}</textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="Country">Country <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('Country') is-invalid @enderror" id="Country" 
                                        name="Country" value="{{ old('Country', $shippingAddress->Country) }}" required maxlength="100">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="ZipCode">Zip Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('ZipCode') is-invalid @enderror" id="ZipCode" 
                                        name="ZipCode" value="{{ old('ZipCode', $shippingAddress->ZipCode) }}" required maxlength="10">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="IsPickupAddress" name="IsPickupAddress" 
                                    value="1" {{ old('IsPickupAddress', $shippingAddress->IsPickupAddress) ? 'checked' : '' }}>
                                <label class="form-check-label" for="IsPickupAddress">This is a pickup address</label>
                            </div>
                        </div>
                        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Update Address</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection