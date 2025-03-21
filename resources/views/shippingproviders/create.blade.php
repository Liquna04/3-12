@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add New Shipping Provider</h5>
                        <a href="{{ route('shipping-providers.index') }}" class="btn btn-secondary">Back to List</a>
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

                    <form action="{{ route('shipping-providers.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="ProviderName">Provider Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('ProviderName') is-invalid @enderror" id="ProviderName" 
                                name="ProviderName" value="{{ old('ProviderName') }}" required maxlength="100">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="Token">Token <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('Token') is-invalid @enderror" id="Token" 
                                name="Token" value="{{ old('Token') }}" required maxlength="255">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="ClientID">Client ID <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('ClientID') is-invalid @enderror" id="ClientID" 
                                name="ClientID" value="{{ old('ClientID') }}" required maxlength="100">
                        </div>
                        
                        <div class="form-group mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="IsRecipientPays" name="IsRecipientPays" 
                                    value="1" {{ old('IsRecipientPays', 1) ? 'checked' : '' }}>
                                <label class="form-check-label" for="IsRecipientPays">Recipient Pays</label>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="ShippingCost">Shipping Cost <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" min="0" class="form-control @error('ShippingCost') is-invalid @enderror" 
                                id="ShippingCost" name="ShippingCost" value="{{ old('ShippingCost') }}" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="EstimatedDeliveryTime">Estimated Delivery Time <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('EstimatedDeliveryTime') is-invalid @enderror" 
                                id="EstimatedDeliveryTime" name="EstimatedDeliveryTime" 
                                value="{{ old('EstimatedDeliveryTime') }}" required maxlength="100">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="ServiceDetails">Service Details</label>
                            <textarea class="form-control @error('ServiceDetails') is-invalid @enderror" 
                                id="ServiceDetails" name="ServiceDetails" rows="3">{{ old('ServiceDetails') }}</textarea>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="DeliveryTimeByRegion">Delivery Time By Region</label>
                            <textarea class="form-control @error('DeliveryTimeByRegion') is-invalid @enderror" 
                                id="DeliveryTimeByRegion" name="DeliveryTimeByRegion" rows="3">{{ old('DeliveryTimeByRegion') }}</textarea>
                        </div>
                        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Create Shipping Provider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection