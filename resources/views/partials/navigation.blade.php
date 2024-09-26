<header class="header">
    <h1>OSAKA</h1>
    <div class="flex items-center">
        <a href="#" class="text-white">
            <i class="fas fa-bell"></i>
            <span class="ml-1">3</span>
        </a>
        <a href="#" class="text-white">User</a>
    </div>
</header>
<div class="sidebar">
      <ul>
            <li><a href="/">Dashboard</a></li>
            <li><a href="{{ route('assets.create') }}">Asset</a></li>
            <li><a href="{{ route('product.stock.create') }}">Product Stock</a></li>          
            <li><a href="#">Orders</a></li>
            <li><a href="#">Category</a></li>
            <li><a href="{{ route('customer.create') }}">Customer</a></li>
            <li><a href="{{ route('employee.create') }}">Employee</a></li> 
            <li><a href="{{ route('expense.create') }}">Expense</a></li>                    
            <li><a href="{{ route('supplier.create') }}">Supplier</a></li>                    
            <li><a href="{{ route('wastage.create') }}">Wastage</a></li>                    
            <li><a href="{{ route('request.create') }}">Request Order</a></li>                    
            <li><a href="{{ route('location.create') }}">Sells Location</a></li>                    
            <li><a href="{{ route('transfer.voucher.create') }}">Transfer Voucher</a></li>  
            <li><a href="{{ route('product.category.create') }}">Product Category</a></li>                    
            <li><a href="{{ route('expense.category.create') }}">Expense Category</a></li>                    
            <li><a href="{{ route('transfer.voucher.create') }}">Payment Metheod</a></li>  
            <li><a href="{{ route('specification.category.create') }}">Detail Specification</a></li>
            <li><a href="{{ route('bank.category.create') }}">Bank</a></li> 
            <li><a href="{{ route('transfer.voucher.create') }}">Sell Order</a></li>
            <li><a href="{{ route('transfer.voucher.create') }}">Sell Payment</a></li>                 
                  
        </ul>
</div>