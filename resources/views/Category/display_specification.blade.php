@extends('layouts.app')

@section('title', 'Specification Category List')

@section('content')
<div class="container mt-5">
<h2 style="text-align: center; padding:10px;">Specification Category List</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
    <!-- <a href="{{ route('specification.category.create') }}" class="btn btn-primary">Add New</a> -->
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

   <div class="row mb-3" style="display: flex; justify-content: space-between; align-items: center;">
    <!-- Entries selection and Add New button -->
    <div class="col-12 col-md-6 d-flex justify-content-between mb-2 mb-md-0">
        <!-- Per Page Selection -->
        <form action="{{ route('specification.category.index') }}" method="GET" class="form-inline" style="flex: 1;">
            <div class="form-group">
                <span>Show
                    <select name="perPage" class="form-control" onchange="this.form.submit()" style="display: inline-block; width: auto;">
                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    entries
                </span>
            </div>
        </form>

        <!-- Add New Button -->
        <a href="{{ route('specification.category.create') }}" class="btn btn-primary ml-2">Add New</a>
    </div>

    <!-- Search and Export buttons -->
    <div class="col-12 col-md-6 d-flex justify-content-end align-items-center">
        <form action="{{ route('specification.category.index') }}" method="GET" class="form-inline" style="flex: 1;">
            <div class="form-group w-100" style="display: flex; align-items: center;">
                <!-- Search input takes more space on small devices -->
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}" style="flex-grow: 1; margin-right: 5px; min-width: 0;">

                <!-- Search button -->
                <button type="submit" class="btn btn-primary mr-1">Search</button>

                <!-- Export dropdown on small devices -->
                <div class="d-block d-md-none dropdown ml-1">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="exportDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Export
                    </button>
                    <div class="dropdown-menu" aria-labelledby="exportDropdown">
                        <a class="dropdown-item" href="javascript:void(0);" onclick="printAllBankDetails()">PDF</a>
                        <a class="dropdown-item" href="{{ route('specification.export') }}">Excel</a>
                    </div>
                </div>

                <!-- Separate buttons for larger devices -->
                <div class="d-none d-md-block ml-1">
                    <button type="button" class="btn btn-primary" onclick="printAllBankDetails()">PDF</button>
                    <button type="button" class="btn btn-primary ml-1" onclick="window.location.href='{{ route('specification.export') }}'">Excel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Responsive table wrapper -->
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($specifications as $specification)
            <tr>
                <td>{{ $specification->id }}</td>
                <td>{{ $specification->description }}</td>
                <td class="text-nowrap">
                            <a href="{{ route('specification.edit', $specification->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('specification.destroy', $specification->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                            <button class="btn btn-info btn-sm ml-1" onclick="printBankDetails('{{ $specification->WastageID }}', '{{ $specification->Product_name }}','{{ $specification->Quantity }}', '{{ $specification->WastageDate }}', '{{ $specification->Reason }}', '{{ $specification->unit }}')">Print</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Showing entries information -->
<div class="mt-3">
    Showing {{ $specifications->firstItem() }} to {{ $specifications->lastItem() }} of {{ $specifications->total() }} entries
</div>

<!-- Customized Pagination -->
<div class="mt-3 d-flex justify-content-between align-items-center">
    <div>
        @if ($specifications->onFirstPage())
            <span class="btn btn-light disabled">Previous</span>
        @else
            <a href="{{ $specifications->previousPageUrl() }}" class="btn btn-light">Previous</a>
        @endif

        @foreach (range(1, $specifications->lastPage()) as $i)
            @if ($i == $specifications->currentPage())
                <span class="btn btn-primary disabled">{{ $i }}</span>
            @else
                <a href="{{ $specifications->url($i) }}" class="btn btn-light">{{ $i }}</a>
            @endif
        @endforeach

        @if ($specifications->hasMorePages())
            <a href="{{ $specifications->nextPageUrl() }}" class="btn btn-light">Next</a>
        @else
            <span class="btn btn-light disabled">Next</span>
        @endif
    </div>

    <!-- Default pagination links -->
    <div>
        {{ $specifications->links() }}
    </div>
</div>
</div>

<!-- JavaScript function to print specification details in table format with headers on top -->
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
const specifications = @json($specifications->items()); // Use items() to get the array of bank details

// Check if specifications is an array
console.log(specifications); // Debugging line to see the content of $specifications

const printWindow = window.open('', '', 'height=500,width=800');
printWindow.document.write('<html><head><title>All specifications Details</title>');
printWindow.document.write('<style>table { width: 100%; border-collapse: collapse; }');
printWindow.document.write('th, td { border: 1px solid black; padding: 10px; text-align: left; }</style>');
printWindow.document.write('</head><body>');
printWindow.document.write('<h2>All specifications Details</h2>');
printWindow.document.write('<table>');

// Add table headers
printWindow.document.write('<thead><tr>');
printWindow.document.write('<th>ID</th>');
printWindow.document.write('<th>Name</th>');
printWindow.document.write('<th>Description</th>');

// Add more headers as needed
printWindow.document.write('</tr></thead><tbody>');

// Loop through the specifications data
specifications.forEach(bank => {
    printWindow.document.write('<tr>');
    printWindow.document.write(<td>${bank.bank_id}</td>); // Use bank_id here
    printWindow.document.write(<td>${bank.bank_name}</td>); // Use bank_name here
    printWindow.document.write(<td>${bank.description}</td>); // Use description here

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

