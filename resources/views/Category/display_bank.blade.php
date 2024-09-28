@extends('layouts.app')

@section('title', 'Bank Category List')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Bank Category List</h2>
        <a href="{{ route('bank.category.create') }}" class="btn btn-primary">Add New</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <form action="{{ route('bank.category.index') }}" method="GET" class="form-inline">
                <div class="form-group mr-2">
                <span>Show
                    <select name="perPage" class="form-control" onchange="this.form.submit()">
                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    entries</span>
                </div>
            </form>
            <!-- Show entries label -->
            <!-- <div class="form-group">
                    <span>Show {{ request('perPage', 10) }} entries</span>
            </div> -->
        </div>
        <form action="{{ route('bank.category.index') }}" method="GET" class="form-inline">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary ml-1">Search</button>
                <button type="button" class="btn btn-primary ml-1" onclick="printAllBankDetails()">PDF</button>
                <button type="button" class="btn btn-primary ml-1" onclick="window.location.href='{{ route('bank.category.export') }}'">Excel</button>
            </div>
        </form>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banks as $bank)
            <tr>
                <td>{{ $bank->bank_id }}</td>
                <td>{{ $bank->bank_name }}</td>
                <td>{{ $bank->description }}</td>
                <td>
                    <a href="{{ route('bank-category.edit', $bank->bank_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('banks.destroy', $bank->bank_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                    </form>
                    <!-- Print button -->
                   <button class="btn btn-info btn-sm ml-1" onclick="printBankDetails('{{ $bank->bank_id }}', '{{ $bank->bank_name }}', '{{ $bank->description }}')">Print</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Showing entries information -->
    <div class="mt-3">
        Showing {{ $banks->firstItem() }} to {{ $banks->lastItem() }} of {{ $banks->total() }} entries
    </div>

    <!-- Customized Pagination -->
    <div class="mt-3 d-flex justify-content-between align-items-center">
        <div>
            @if ($banks->onFirstPage())
                <span class="btn btn-light disabled">Previous</span>
            @else
                <a href="{{ $banks->previousPageUrl() }}" class="btn btn-light">Previous</a>
            @endif

            @foreach (range(1, $banks->lastPage()) as $i)
                @if ($i == $banks->currentPage())
                    <span class="btn btn-primary disabled">{{ $i }}</span>
                @else
                    <a href="{{ $banks->url($i) }}" class="btn btn-light">{{ $i }}</a>
                @endif
            @endforeach

            @if ($banks->hasMorePages())
                <a href="{{ $banks->nextPageUrl() }}" class="btn btn-light">Next</a>
            @else
                <span class="btn btn-light disabled">Next</span>
            @endif
        </div>

        <!-- Default pagination links -->
        <div>
            {{ $banks->links() }}
        </div>
    </div>
</div>



<!-- JavaScript function to print bank details in table format with headers on top -->
<script>
function printBankDetails(id, name, description) {
    const printWindow = window.open('', '', 'height=500,width=800');
    printWindow.document.write('<html><head><title>Bank Details</title>');
    printWindow.document.write('<style>table { width: 100%; border-collapse: collapse; }');
    printWindow.document.write('th, td { border: 1px solid black; padding: 10px; text-align: left; }</style>');
    printWindow.document.write('</head><body>');
    printWindow.document.write('<h2>Bank Details</h2>');
    printWindow.document.write('<table>');
    
    // Add table headers
    printWindow.document.write('<thead><tr>');
    printWindow.document.write('<th>ID</th>');
    printWindow.document.write('<th>Name</th>');
    printWindow.document.write('<th>Description</th>');
    printWindow.document.write('</tr></thead>');
    
    // Add table body with bank details
    printWindow.document.write('<tbody><tr>');
    printWindow.document.write('<td>' + id + '</td>');
    printWindow.document.write('<td>' + name + '</td>');
    printWindow.document.write('<td>' + description + '</td>');
    printWindow.document.write('</tr></tbody>');
    
    printWindow.document.write('</table>');
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
}
</script>

<!-- JavaScript function to print all bank details in table format -->
<script>
function printAllBankDetails() {
    const banks = @json($banks->items()); // Use items() to get the array of bank details

    // Check if banks is an array
    console.log(banks); // Debugging line to see the content of $banks

    const printWindow = window.open('', '', 'height=500,width=800');
    printWindow.document.write('<html><head><title>All Banks Details</title>');
    printWindow.document.write('<style>table { width: 100%; border-collapse: collapse; }');
    printWindow.document.write('th, td { border: 1px solid black; padding: 10px; text-align: left; }</style>');
    printWindow.document.write('</head><body>');
    printWindow.document.write('<h2>All Banks Details</h2>');
    printWindow.document.write('<table>');

    // Add table headers
    printWindow.document.write('<thead><tr>');
    printWindow.document.write('<th>ID</th>');
    printWindow.document.write('<th>Name</th>');
    printWindow.document.write('<th>Description</th>');

    // Add more headers as needed
    printWindow.document.write('</tr></thead><tbody>');

    // Loop through the banks data
    banks.forEach(bank => {
        printWindow.document.write('<tr>');
        printWindow.document.write(`<td>${bank.bank_id}</td>`); // Use bank_id here
        printWindow.document.write(`<td>${bank.bank_name}</td>`); // Use bank_name here
        printWindow.document.write(`<td>${bank.description}</td>`); // Use description here

        // Add more fields as needed
        printWindow.document.write('</tr>');
    });

    printWindow.document.write('</tbody></table>');
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
</script>

@endsection