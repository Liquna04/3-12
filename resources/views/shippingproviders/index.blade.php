@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Shipping Providers</h5>
                    <a href="{{ route('shipping-providers.create') }}" class="btn btn-primary">Add New Provider</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Provider Name</th>
                                    <th>Client ID</th>
                                    <th>Recipient Pays</th>
                                    <th>Shipping Cost</th>
                                    <th>Estimated Delivery Time</th>
                                    <th width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($shippingProviders as $provider)
                                    <tr>
                                        <td>{{ $provider->ProviderID }}</td>
                                        <td>{{ $provider->ProviderName }}</td>
                                        <td>{{ $provider->ClientID }}</td>
                                        <td>{{ $provider->IsRecipientPays ? 'Yes' : 'No' }}</td>
                                        <td>{{ number_format($provider->ShippingCost, 2) }}</td>
                                        <td>{{ $provider->EstimatedDeliveryTime }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('shipping-providers.edit', $provider->ProviderID) }}" class="btn btn-sm btn-info">Edit</a>
                                                <form action="{{ route('shipping-providers.destroy', $provider->ProviderID) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this provider?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No shipping providers found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-center mt-3">
                        {{ $shippingProviders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection