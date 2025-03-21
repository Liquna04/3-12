@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Product Attribute Values</span>
                    <a href="{{ route('product-attribute-values.create') }}" class="btn btn-primary btn-sm">Add New Value</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Attribute</th>
                                    <th>Value</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($attributeValues as $value)
                                    <tr>
                                        <td>{{ $value->ValueID }}</td>
                                        <td>{{ $value->attribute->Name }}</td>
                                        <td>{{ $value->Value }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('product-attribute-values.edit', $value->ValueID) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('product-attribute-values.destroy', $value->ValueID) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this attribute value?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No attribute values found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $attributeValues->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection