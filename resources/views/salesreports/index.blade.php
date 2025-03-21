@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Sales Reports</h3>
                    <a href="{{ route('salesreports.create') }}" class="btn btn-primary">Add New Report</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Report ID</th>
                                    <th>Product</th>
                                    <th>Quantity Sold</th>
                                    <th>Total Sales</th>
                                    <th>Report Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($salesReports as $report)
                                <tr>
                                    <td>{{ $report->ReportID }}</td>
                                    <td>{{ $report->product->ProductName ?? 'N/A' }}</td>
                                    <td>{{ $report->QuantitySold }}</td>
                                    <td>${{ number_format($report->TotalSales, 2) }}</td>
                                    <td>{{ $report->ReportDate->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('salesreports.edit', $report->ReportID) }}" class="btn btn-sm btn-info">Edit</a>
                                            <form action="{{ route('salesreports.destroy', $report->ReportID) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this report?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No sales reports found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3">
                        {{ $salesReports->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection