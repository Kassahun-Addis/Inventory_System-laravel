<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM0p2ryg1z7V8L7tGt6vZ3k5s0o5X3qvX4y4" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #4caf50; /* Green background */
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .sidebar {
            width: 250px;
            background-color: #f5f5f5; /* Light gray */
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
            background-color: #ddd; /* Lighter gray on hover */
        }
        .main-content {
            margin-left: 250px; /* Same as sidebar width */
            padding: 20px;
        }
        .form-section {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #ff9800; /* Orange */
            color: white;
        }
        .btn-secondary {
            background-color: #e0e0e0; /* Light gray */
            color: black;
        }
        .btn-link {
            background-color: transparent;
            color: black;
        }
        .required:after {
            content: " *";
            color: red;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>OSAKA</h1>
        <div class="flex items-center">
        <a href="#" class="text-white">
        <i class="fas fa-home"></i> <!-- Notifications Icon -->
                <span class="ml-1">3</span> <!-- Optional: Notification count -->
            </a>
            <a href="#" class="text-whit">User</a>
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
</body>
</html>