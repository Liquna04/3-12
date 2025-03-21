@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Shipping Addresses</h5>
                    <a href="{{ route('shipping-addresses.create') }}" class="btn btn-primary">Add New Address</a>
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
                                    <th>Customer</th>
                                    <th>Location Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>Pickup Address</th>
                                    <th width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($shippingAddresses as $address)
                                    <tr>
                                        <td>{{ $address->AddressID }}</td>
                                        <td>{{ $address->customer->Name ?? $address->CustomerID }}</td>
                                        <td>{{ $address->LocationName }}</td>
                                        <td>{{ $address->Email }}</td>
                                        <td>{{ $address->Phone }}</td>
                                        <td>{{ $address->Address }}, {{ $address->ZipCode }}</td>
                                        <td>{{ $address->Country }}</td>
                                        <td>{{ $address->IsPickupAddress ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('shipping-addresses.edit', $address->AddressID) }}" class="btn btn-sm btn-info">Edit</a>
                                                <form action="{{ route('shipping-addresses.destroy', $address->AddressID) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this address?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No shipping addresses found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-center mt-3">
                        {{ $shippingAddresses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection