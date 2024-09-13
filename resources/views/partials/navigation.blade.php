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
            <li><a href="#">Expense</a></li>
            <li><a href="#">Payment</a></li>
            <li><a href="#">Supplier</a></li>
            <li><a href="#">Wastage</a></li>
            <li><a href="#">Sells Location</a></li>
            <li><a href="#">Request Order</a></li>
            <li><a href="#">Transfer Voucher</a></li>
        </ul>
</div>