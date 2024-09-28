<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
    /* Ensure the header is fixed */
    .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 50;
    }

    /* Prevent main content from hiding behind the fixed header */
    .main-content {
        margin-top: 75px; /* Adjust this based on your header height */
    }

    /* Sidebar styles */
    #sidebar {
        transform: translateX(0); /* Show sidebar by default on large devices */
        transition: transform 0.3s ease; /* Smooth transition */
    }

    /* Hide sidebar off-screen on small devices */
    @media (max-width: 768px) {
        #sidebar {
            transform: translateX(-100%); /* Hide sidebar off-screen */
        }
        #sidebar.active {
            transform: translateX(0); /* Show sidebar */
        }
        #menu-toggle {
            display: block; /* Show menu toggle button on small devices */
        }
    }

    /* Hide menu toggle button on large devices */
    @media (min-width: 769px) {
        #menu-toggle {
            display: none; /* Hide menu toggle button on large devices */
        }
    }

    /* Overlay for mobile menu */
    #overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        display: none; /* Initially hidden */
        z-index: 40; /* Ensure overlay appears above other content */
    }


 
    .hidden {
        display: none; /* Ensure hidden elements are not displayed */
    }
    
    /* Sidebar styles */
    #sidebar {
        transform: translateX(0); /* Default visible */
        transition: transform 0.3s ease; /* Smooth transition */
    }

    /* Hide sidebar off-screen on small devices */
    @media (max-width: 768px) {
        #sidebar {
            transform: translateX(-100%); /* Hide sidebar off-screen */
        }
        #sidebar.active {
            transform: translateX(0); /* Show sidebar */
        }
    }

</style>

<!-- Header Section -->
<header class="header bg-blue-600 text-white p-2 flex justify-between items-center shadow-lg">
    <h1 class="text-2xl font-bold">OSAKA</h1>
    <div class="flex items-center">
        <a href="#" class="text-white relative mr-4">
            <i class="fas fa-bell"></i>
            <span class="absolute top-0 right-0 bg-red-600 text-xs rounded-full px-1">3</span>
        </a>
        <a href="#" class="text-white flex items-center">
            <i class="fas fa-user mr-1"></i>
            <span>User</span>
        </a>
    </div>
    <div>
        <button id="menu-toggle" class="text-white focus:outline-none hidden">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </div>
</header>

<!-- Sidebar Section -->
<div id="sidebar" class="sidebar bg-gray-800 text-white w-64 h-screen fixed z-10 shadow-lg">
    <ul class="mt-0 space-y-1 pl-0 list-none">
        <li><a href="/" class="flex items-center p-2 hover:bg-gray-700 rounded"><i class="fas fa-home mr-2"></i>Dashboard</a></li>
        <li><a href="{{ route('assets.create') }}" class="flex items-center p-2 hover:bg-gray-700 rounded"><i class="fas fa-briefcase mr-2"></i>Asset</a></li>
        <li><a href="{{ route('product.stock.create') }}" class="flex items-center p-2 hover:bg-gray-700 rounded"><i class="fas fa-briefcase mr-2"></i>Product Stock</a></li>


        <li>
            <a href="#" class="flex items-center justify-between p-2 hover:bg-gray-700 rounded" id="category-toggle">
                <span><i class="fas fa-folder-open mr-2"></i>Category</span>
                <i class="fas fa-chevron-down"></i>
            </a>
            <ul class="ml-0 hidden" id="category-submenu">
                <li><a href="{{ route('product.category.create') }}" class="flex items-center p-1 hover:bg-gray-700 rounded"><i class="fas fa-tags mr-2"></i>Product Category</a></li>
                <li><a href="{{ route('expense.category.create') }}" class="flex items-center p-1 hover:bg-gray-700 rounded"><i class="fas fa-money-bill mr-2"></i>Expense Category</a></li>
                <li><a href="{{ route('specification.category.create') }}" class="flex items-center p-1 hover:bg-gray-700 rounded"><i class="fas fa-info-circle mr-2"></i>Detail Specification</a></li>
                <li><a href="{{ route('bank.category.create') }}" class="flex items-center p-1 hover:bg-gray-700 rounded"><i class="fas fa-university mr-2"></i>Bank</a></li>
                <li><a href="{{ route('payment-method.category.create') }}" class="flex items-center p-1 hover:bg-gray-700 rounded"><i class="fas fa-university mr-2"></i>Payment Metheod</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="flex items-center justify-between p-2 hover:bg-gray-700 rounded" id="order-toggle">
                <span><i class="fas fa-folder-open mr-2"></i>Orders</span>
                <i class="fas fa-chevron-down"></i>
            </a>
            <ul class="ml-0 hidden" id="order-submenu">
                <li><a href="{{ route('transfer.voucher.create') }}" class="flex items-center p-1 hover:bg-gray-700 rounded"><i class="fas fa-file-invoice mr-2"></i>Sell Order</a></li>
                <li><a href="{{ route('request.create') }}" class="flex items-center p-1 hover:bg-gray-700 rounded"><i class="fas fa-envelope-open mr-2"></i>Request Order</a></li>
            </ul>
        </li>
        <!-- Other Links -->
        <li><a href="{{ route('customer.create') }}" class="flex items-center p-2 hover:bg-gray-700 rounded"><i class="fas fa-users mr-2"></i>Customer</a></li>
        <li><a href="{{ route('employee.create') }}" class="flex items-center p-2 hover:bg-gray-700 rounded"><i class="fas fa-user-tie mr-2"></i>Employee</a></li>
        <li><a href="{{ route('expense.create') }}" class="flex items-center p-2 hover:bg-gray-700 rounded"><i class="fas fa-wallet mr-2"></i>Expense</a></li>
        <li><a href="{{ route('supplier.create') }}" class="flex items-center p-2 hover:bg-gray-700 rounded"><i class="fas fa-truck mr-2"></i>Supplier</a></li>
        <li><a href="{{ route('wastage.create') }}" class="flex items-center p-2 hover:bg-gray-700 rounded"><i class="fas fa-trash mr-2"></i>Wastage</a></li>
        <li><a href="{{ route('location.create') }}" class="flex items-center p-2 hover:bg-gray-700 rounded"><i class="fas fa-map-marker-alt mr-2"></i>Sells Location</a></li>
        <li><a href="{{ route('transfer.voucher.create') }}" class="flex items-center p-2 hover:bg-gray-700 rounded"><i class="fas fa-exchange-alt mr-2"></i>Transfer Voucher</a></li>
        <li><a href="{{ route('transfer.voucher.create') }}" class="flex items-center p-2 hover:bg-gray-700 rounded"><i class="fas fa-file-invoice-dollar mr-2"></i>Sell Payment</a></li>
    </ul>
</div>

<!-- Overlay for mobile menu -->
<div id="overlay" class="overlay"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const categoryToggle = document.getElementById('category-toggle');
        const categorySubmenu = document.getElementById('category-submenu');
        const orderToggle = document.getElementById('order-toggle');
        const orderSubmenu = document.getElementById('order-submenu');

        // Toggle the sidebar for mobile devices
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active'); // Show/hide sidebar
            overlay.style.display = sidebar.classList.contains('active') ? 'block' : 'none'; // Show/hide overlay
        });

        // Toggle the category submenu
        categoryToggle.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default anchor behavior
            categorySubmenu.classList.toggle('hidden'); // Show/hide submenu
        });

        orderToggle.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default anchor behavior
            orderSubmenu.classList.toggle('hidden'); // Show/hide submenu
        });

        // Close sidebar when clicking on overlay
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('active'); // Hide sidebar
            overlay.style.display = 'none'; // Hide overlay
            categorySubmenu.classList.add('hidden'); // Ensure submenu is hidden
            orderSubmenu.classList.add('hidden'); // Ensure submenu is hidden

        });
    });
</script>
