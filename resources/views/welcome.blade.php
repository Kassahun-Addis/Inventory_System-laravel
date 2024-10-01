<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'OSAKA')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">                                                                                                                       
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Include Popper.js (for Bootstrap dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <style>
        /* Add your styles here */
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .sidebar {
            width: 230px;
            background-color: #f5f5f5;
            padding: 15px;
            position: fixed;
            height: 100%;
            overflow-y: auto;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #ddd;
        }
     
        
        .form-section {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn-primary {
            background-color: #ff9800; /* Orange */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }
        .btn-secondary {
            background-color: #e0e0e0; /* Light gray */
            color: black;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }
        .btn-link {
            background-color: transparent;
            color: black;
            padding: 10px 15px;
            border: 1px solid transparent;
            border-radius: 4px;
            text-decoration: none;
        }
        .required:after {
            content: " *";
            color: red;
        }
        .container {
            padding-left: 10px;
            padding-right: -10px;
        }




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
    position: relative; /* Ensure main content stays below sidebar */
    z-index: 1; /* Lower z-index to ensure it stays below sidebar */
    margin-left: 250px; /* Keep fixed margin for larger screens */
    margin-right: 40px; /* Keep fixed margin for larger screens */
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
        z-index: 90; /* Ensure overlay appears above other content */
    }

    .hidden {
        display: none; /* Ensure hidden elements are not displayed */
    }
    
    /* Sidebar styles */
    #sidebar {
        transform: translateX(0); /* Default visible */
        transition: transform 0.3s ease; /* Smooth transition */
        z-index: 100;

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
            background:blue;
        }
       
        .main-content {
            margin: 75px 5px 5px 5px;
            padding: 0;
       }

    }

    ul.mt-0 {
    margin-top: 0;
    padding-left: 0;
    list-style-type: none;
}
</style>
</head>
<body>
  <!-- Header Section -->
<header class="header bg-blue-600 text-white p-2 flex justify-between items-center shadow-lg">
    <h2 class="text-2xl font-bold">OSAKA</h2>
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
        <li><a href="{{ route('sell-payment.create') }}" class="flex items-center p-2 hover:bg-gray-700 rounded"><i class="fas fa-file-invoice-dollar mr-2"></i>Sell Payment</a></li>
    </ul>
</div>

<div class="main-content">
<div class = "dashboared">
<h2 style = "background: red">Here is sample pie chart, graph....</h2>
</div>
</div>
    <!-- <div class="main-content">
        <header class="header" style="background-color: #4caf50;">
            <h2>Banks, Add new</h2>
        </header>
        <div class="form-section mt-4">
            <h3>Details</h3>
            <form action="#" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="bank_name" class="block text-sm font-medium text-gray-700 required">Bank Name</label>
                    <input type="text" id="bank_name" name="bank_name" class="border rounded w-full p-2" required>
                </div>
                <div class="flex space-x-2">
                    <button type="submit" class="btn-primary px-4 py-2 rounded">Save</button>
                    <button type="reset" class="btn-secondary px-4 py-2 rounded">Reset</button>
                    <a href="#" class="btn-link px-4 py-2 rounded">Back to list</a>
                </div>
            </form>
        </div>
    </div> -->

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

</body>
</html>


