<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EyeWear Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Layout */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            transition: width 0.3s ease;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }

        .name {
            text-align: center;
            margin-left: 20%;
            margin-right: 20%;
            background-color: #2a5298;
            color: #2d3333;
            font-style: sans-serif;
            font-variant-caps: all-small-caps;
        }

        .content {
            margin-left: 15px;
            padding: 20px;
        }

        #con {
            /* padding:5px; */
            /* text-align: center; */
            justify-content: center;
        }

        .sidebar.collapsed {
            width: 75px;
        }

        .main-content {
            margin-left: 270px;
            margin-right: 25px;
            transition: margin-left 0.3s ease;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .main-content.expanded {
            margin-left: 75px;
        }

        /* Sidebar styles */
        .sidebar-heading {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        .nav-link {
            border-radius: 5px;
            transition: all 0.2s ease;
            padding: 0.5rem 1rem;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Content sections */
        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
        }

        /* Card styles */
        .card {
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            margin-bottom: 1.5rem;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

        /* Form styles */
        .form-control:focus,
        .form-select:focus {
            border-color: #2a5298;
            box-shadow: 0 0 0 0.2rem rgba(42, 82, 152, 0.25);
        }

        /* Table styles */
        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }

        .table td {
            vertical-align: middle;
        }

        /* Button styles */
        .btn {
            transition: all 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            background-color: #2a5298;
            border-color: #2a5298;
        }

        .btn-primary:hover {
            background-color: #1e3c72;
            border-color: #1e3c72;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .sidebar {
                width: 75px;
            }

            .main-content {
                margin-left: 75px;
            }

            .sidebar-text {
                display: none;
            }

            .sidebar-heading {
                display: none;
            }
        }

        /* Animation classes */
        .fade-in {
            animation: fadeIn 0.3s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Form transitions */
        [id$="Form"] {
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body class="body">
    <div class="d-flex">

        <!-- Sidebar -->
        <!-- <div class="sidebar bg-dark text-white" id="sidebar"> -->
        <!-- <div class="sidebar bg-primary text-white d-flex flex-column p-3"> -->
        <div class="sidebar bg-dark text-white  overflow-auto" style="max-height: 100vh;">
            <div class="p-3 border-bottom border-secondary">
                <img class="text-center sidebar-title" src="{{ asset('storage/eye.jpg') }}" class="rounded-circle" width="50" height="50">
            </div>
            <ul class="nav flex-column pt-3">
                <li class="nav-item mb-3">
                    <a href="dashboard" class="nav-link text-white d-flex align-items-center" data-section="">
                        <i class="bi bi-graph-up me-2"></i>
                        <span class="sidebar-text">Admin Dashboard</span>
                    </a>
                </li>
                <!-- Database Management Section -->
                <li class="nav-item mb-2">
                    <div class="sidebar-heading text-muted ps-3 mb-2"> </div>
                </li>
                <li class="nav-item mb-2">
                    <a href="products/plist" class="nav-link text-white d-flex align-items-center" data-section="products">
                        <i class="bi bi-box me-2"></i>
                        <span class="sidebar-text">Products</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="categories/catlist" class="nav-link text-white d-flex align-items-center"
                        data-section="categories">
                        <i class="bi bi-grid me-2"></i>
                        <span class="sidebar-text">Categories</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="subcategories/subcate_list" class="nav-link text-white d-flex align-items-center"
                        data-section="subcategories">
                        <i class="bi bi-diagram-3 me-2"></i>
                        <span class="sidebar-text">SubCategories</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="customers/clist" class="nav-link text-white d-flex align-items-center" data-section="customers">
                        <i class="bi bi-person-fill-add me-2"></i>
                        <span class="sidebar-text">Customers</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="suppliers/slist" class="nav-link text-white d-flex align-items-center" data-section="suppliers">
                        <i class="bi bi-people me-2"></i>
                        <span class="sidebar-text">Suppliers</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="employees/emplist" class="nav-link text-white d-flex align-items-center" data-section="employees">
                        <i class="bi bi-person-badge me-2"></i>
                        <span class="sidebar-text">Employees</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="offers/offerlist" class="nav-link text-white d-flex align-items-center" data-section="offers">
                        <i class="bi bi-megaphone me-2"></i>
                        <span class="sidebar-text">Offers</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="brands/brandlist" class="nav-link text-white d-flex align-items-center" data-section="brands">
                        <i class="bi bi-sunglasses me-2"></i>
                        <span class="sidebar-text">Brands</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="frames/framelist" class="nav-link text-white d-flex align-items-center" data-section="frames">
                        <i class="bi bi-person-badge me-2"></i>
                        <span class="sidebar-text">Frames</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="prescriptions/prelist" class="nav-link text-white d-flex align-items-center" data-section="prescriptions">
                        <i class="bi bi-eye me-2"></i>
                        <span class="sidebar-text">Prescriptions</span>
                    </a>
                </li>
                <!-- Operations Section -->
                <li class="nav-item mb-2">
                    <div class="sidebar-heading text-muted ps-3 mb-2" style="font-size:17px; color:black; font-style:'bold'; font-weight:30px;">Operations</div>
                </li>
                <li class="nav-item mb-2">
                    <a href="orders/o_list" class="nav-link text-white d-flex align-items-center" data-section="orders">
                        <i class="bi bi-cart me-2"></i>
                        <span class="sidebar-text">Orders</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="orderdetails/od_list" class="nav-link text-white d-flex align-items-center" data-section="orderdetails">
                        <i class="bi bi-boxes me-2"></i>
                        <span class="sidebar-text">Order_details</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="shipping/shiplist" class="nav-link text-white d-flex align-items-center" data-section="delivery">
                        <i class="bi bi-truck me-2"></i>
                        <span class="sidebar-text">Shipping/Delivery</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="bills/blist" class="nav-link text-white d-flex align-items-center" data-section="bills">
                        <i class="bi bi-journal-text me-2"></i>
                        <span class="sidebar-text">Bill</span>
                    </a>
                </li>
                <!-- Reports & Feedback Section -->
                <li class="nav-item mb-2">
                    <div class="sidebar-heading text-muted ps-3 mb-2" style="font-size:17px; color:black; font-style:'bold'; font-weight:30px;">Reports & Feedback</div>
                </li>
                <li class="nav-item mb-2">
                <li class="nav-item mb-2">
                    <div class="sidebar-heading text-muted ps-3 mb-2" style="font-size:15px; font-weight:30px;">Reports:</div>
                </li>
                <a href="sale_products/sale_report" class="nav-link text-white d-flex align-items-center" data-section="saleproducts">
                    <i class="bi bi-file-earmark-text me-2"></i>
                    <span class="sidebar-text">Sale products</span>
                </a>
                <a href="purchase_products/purpro_list" class="nav-link text-white d-flex align-items-center" data-section="purchase_products">
                    <i class="bi bi-file-earmark-text me-2"></i>
                    <span class="sidebar-text">Purchase products</span>
                </a>
                <li class="nav-item mb-2">
                    <div class="sidebar-heading text-muted ps-3 mb-2" style="font-size:15px; color:black; font-style:'bold'; font-weight:30px;">Feedbacks:</div>
                </li>
                <li class="nav-item mb-2">
                    <a href="review_feedbacks/rf_list" class="nav-link text-white d-flex align-items-center" data-section="review_feedbacks">
                        <i class="bi bi-chat-dots me-2"></i>
                        <span class="sidebar-text">Reviews & Feedback</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <!-- <a href="complains/com_list" class="nav-link text-white d-flex align-items-center" data-section="complains">
                    <i class="bi bi-chat-dots me-2"></i>
                    <span class="sidebar-text">Compalins</span>
                </a> -->
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content" id="mainContent">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-link" id="sidebarToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="d-flex align-items-center">

                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle" type="button" id="profileDropdown"
                                data-bs-toggle="dropdown">
                                <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?w=100&h=100&fit=crop"
                                    alt="Admin" class="rounded-circle" width="32" height="32">
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" style="font-size:larger; font-weight:700; width:auto; height:auto; border:4px solid black; background-color:Lightyellow; color:#f8f9fa; border-radius:16px;">
                                <li style="font-style:bold; font-weight:700px; font-size:20px;"><a class="dropdown-item" href="adminlist">My Profile</a></li>
                                <li style="font-style:bold; font-weight:700px; font-size:20px;"><a class="dropdown-item" href="Loginadmin/login">Login</a></li>
                                <li style="font-style:bold; font-weight:700px; font-size:20px;">
                                    <hr class="dropdown-divider" style="text-decoration:dashed; color:#2a5298;">
                                </li>
                                <li style="font-style:bold; font-weight:700px; font-size:20px;"><a class="dropdown-item" style="color:red" href="Loginadmin/login">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div>
                <div class="container-fluid p-4" class="name">
                    <h2 class="text-center">Welcome to the Admin Dashboard</h2>
                    <p class="text-center">Manage your store efficiently and effectively.</p>
                </div>
            </div>
            <!-- Dashboard Title -->
            <!-- <h2 class="name">Admin Dashboard</h2> -->

            <!-- Cards Summary -->
            <div class="content">
                <div class="row" id="con">
                    <div class="col-md-2">
                        <div class="card text-white bg-primary mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Total Products</h5>
                                <p class="card-text">{{$totalProducts}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card text-white bg-success mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Total Customers</h5>
                                <p class="card-text">{{$totalCustomers}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card text-white bg-warning mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Orders Pending</h5>
                                <p class="card-text">{{$totalOrders}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card text-white bg-primary mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Total Offers</h5>
                                <p class="card-text">{{$totalOffers}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="card text-white bg-danger mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Total Orders</h5>
                                <p class="card-text">{{$totalOrders}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Orders Table -->
                <h4 style="color:black;">Recent Orders</h4>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->o_id }}</td>
                            <td>{{ $order->customer->c_name ?? 'N/A' }}</td>
                            @if($order->orderdetails->count() > 0)
                            @foreach ($order->orderdetails as $order_detail)
                            <!-- <tr>
                                        <td colspan="2"></td>  -->
                            <td>{{ $order_detail->product->p_name ?? 'N/A' }}</td>
                            <td>{{ $order_detail->qty ?? 0 }}</td>
                            <td><span class="badge bg-success text-white px-2">{{ $order->o_status }}</span></td>
                            <!-- </tr> -->
                            @endforeach
                            @else
                            <td colspan="3">No order details available</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Content Sections -->
            <div class="container-fluid p-4">

                <!-- Orders Section -->
                <section id="ordersSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Orders Management</h2>
                    </div>
                    @include('admin.orders.olist')

                </section>

                <!-- Bills Section -->
                <section id="billsSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Bill Management</h2>
                        <button class="btn btn-primary" onclick="showForm('bills')" style="width:auto;">
                            <i class="bi bi-plus-lg"></i> Add Bill
                        </button>
                    </div>

                    <!-- Products Form -->
                    @include('admin.bills.badd')

                    <!-- Products Table -->
                    @include('admin.bills.blist')
                </section>

                <section id="orderdetailsSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>OrderDetails Management</h2>
                    </div>

                    <!-- Products Form -->


                    <!-- Products Table -->
                    @include('admin.orderdetails.od_list')
                </section>

                <!-- Products Section -->
                <section id="productsSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Products Management</h2>
                        @if(count($lowStockProducts) > 0)
                        <br>
                        <br>
                        <br>

                        <div class="card shadow-sm border-danger mb-4" style="margin-left:auto;">
                            <div class="card-body p-0">
                            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center d-flex">
                                <span><i class="bi bi-exclamation-triangle-fill"></i> Low Stock Alerts ({{ count($lowStockProducts) }})</span>
                                <!-- <a href="{{ route('admin.products.lowstock') }}" class="btn btn-light btn-sm">View All</a> -->
                            </div>
                                <ul class="list-group d-flex">
                                <!-- list-group-flush -->
                                    @foreach($lowStockProducts->take(3) as $product) <!-- show top 5 low stock -->
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                        <img src="{{ url('storage/products/')}}/{{ $product->p_img}}" alt="{{ $product->p_name }}" width="60" height="60">
                                        <strong>{{ $product->p_name }}</strong>
                                        </div>
                                        <span class="badge bg-danger rounded-pill">{{ $product->qty }} Left</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                                <!-- <span><i class="bi bi-exclamation-triangle-fill"></i> Low Stock Alerts ({{ count($lowStockProducts) }})</span> -->
                                <a href="{{ route('admin.products.lowstock') }}" class="btn btn-light btn-sm">View All</a>
                            </div>
                        </div>
                        @endif
                        <br>
                        @if($outOfStockCount > 0)
                        <br>
                        <br>
                        <br>
                        <div class="alert alert-dark" style="margin-left: auto;">
                            ⚫ {{ $outOfStockCount }} products are completely out of stock!<br>
                            <a href="{{ route('admin.products.outofstock') }}" class="btn btn-light btn-sm">View Out of Stock</a>
                        </div>
                        @endif

                        <button class="btn btn-primary" onclick="showForm('products')" style="width:auto; margin-left:auto;">
                            <i class="bi bi-plus">
                            </i> Add Product
                        </button>
                    </div>
                    <br>
                    @include('admin.products.padd')

                    <!-- Products Table -->

                    @include('admin.products.plist')


                </section>
                <!-- Categories Section -->
                <section id="categoriesSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Category Management</h2>
                        <button class="btn btn-primary" onclick="showForm('categories')" style="width:auto;">
                            <i class="bi bi-plus-lg"></i> Add Category
                        </button>
                    </div>

                    <!-- Categories Form -->
                    @include('admin.categories.catadd')

                    <!-- Categories Table -->
                    @include('admin.categories.catlist')

                </section>

                <!-- Categories Section -->
                <section id="subcategoriesSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>SubCategory Management</h2>
                        <button class="btn btn-primary" onclick="showForm('subcategories')" style="width:auto;">
                            <i class="bi bi-plus-lg"></i> Add Sub Category
                        </button>
                    </div>

                    <!-- Categories Form -->
                    @include('admin.subcategories.subcate_add')

                    <!-- Categories Table -->
                    @include('admin.subcategories.subcate_list')

                </section>


                <!-- Employees Section -->
                <section id="employeesSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Employees Management</h2>
                        <button class="btn btn-primary" onclick="showForm('employees')" style="width:auto;">
                            <i class="bi bi-plus-lg"></i> Add Employee
                        </button>
                    </div>
                    <!-- Employees Form -->
                    @include('admin.employees.empadd')

                    <!-- Employees Table -->
                    @include('admin.employees.emplist')
                </section>


                <!-- offers Section -->
                <section id="offersSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Offers Management</h2>

                        <button class="btn btn-primary" onclick="showForm('offers')" style="width:auto;">
                            <i class="bi bi-plus-lg"></i> Add Offer
                        </button>
                    </div>

                    <!-- Offers Form -->
                    @include('admin.offers.offeradd')

                    <!-- Offers Table -->
                    @include('admin.offers.offerlist')

                </section>

                <section id="brandsSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Brands Management</h2>
                        <button class="btn btn-primary" onclick="showForm('brands')" style="width:auto;">
                            <i class="bi bi-plus-lg"></i> Add Brand
                        </button>
                    </div>

                    <!-- Brands Form -->
                    @include('admin.brands.brandadd')

                    <!-- Brands Table -->
                    @include('admin.brands.brandlist')

                </section>

                <!-- Frames Section -->
                <section id="framesSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Frames Management</h2>
                        <button class="btn btn-primary" onclick="showForm('frames')" style="width:auto;">
                            <i class="bi bi-plus-lg"></i> Add Frames
                        </button>
                    </div>

                    <!-- Brands Form -->
                    @include('admin.frames.frameadd')

                    <!-- Brands Table -->
                    @include('admin.frames.framelist')

                </section>

                <!-- Prescriptions Section -->
                <section id="prescriptionsSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Prescriptions Management</h2>
                        <!-- <button class="btn btn-primary" onclick="showForm('prescriptions')">
                            <i class="bi bi-plus-lg"></i> Add Prescription
                        </button> -->
                    </div>
                    <!-- Prescriptions add -->
                    <!-- @include('admin.prescriptions.preadd') -->

                    <!-- Prescriptions Table -->
                    @include('admin.prescriptions.prelist')

                </section>

                <section id="suppliersSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Suppliers Management</h2>
                        <!-- <button class="btn btn-primary" onclick="showForm('suppliers')">
                            <i class="bi bi-plus-lg"></i> Add Supplier
                        </button> -->
                    </div>

                    <!-- Brands add -->
                    <!-- @include('admin.suppliers.sadd') -->

                    <!-- Brands Table -->
                    @include('admin.suppliers.slist')

                </section>

                <!-- Admin Section -->
                <section id="adminsSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <!-- <h2></h2> -->
                    </div>

                    <!-- Admin Table -->
                    @include('admin.adminlist')

                    @include('admin.adminedit')


                </section>

                <!-- AdminLOgin Section -->
                <section id="adminloginSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <!-- <h2></h2> -->
                    </div>

                    <!-- Admin Table -->
                    @include('admin.Loginadmin.login')
                </section>


                <!-- AdminLogout Section -->
                <section id="adminlogoutSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <!-- <h2></h2> -->
                    </div>

                    <!-- Admin Table -->
                    @include('admin.Loginadmin.login')
                </section>


                <!-- customers Section -->
                <section id="customersSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Customers Management</h2>
                    </div>

                    <!-- Brands Table -->
                    @include('admin.customers.clist')

                </section>
                <!--purchase_products  Section -->
                <section id="purchase_productsSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2></h2>
                    </div>

                    <!-- Brands Table -->
                    @include('admin.purchase_products.purpro_list')

                </section>

                <section id="saleproductsSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2></h2>
                    </div>

                    <!-- Brands Table -->
                    @include('admin.sale_products.sale_report')

                </section>
                <section id="review_feedbacksSection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Review Feedbacks</h2>
                    </div>

                    <!-- Brands Table -->
                    @include('admin.review_feedbacks.rf_list')

                </section>


                <!--delivery  Section -->
                <section id="deliverySection" class="content-section">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Shipping Management</h2>
                        <button class="btn btn-primary" onclick="showForm('shipping')" style="width:auto;">
                            <i class="bi bi-plus-lg"></i> Add Shipping
                        </button>
                    </div>


                    <!-- Shipping add -->
                    @include('admin.shipping.shipadd')

                    <!-- Shiiping Table -->
                    @include('admin.shipping.shiplist')

                </section>
                <section id="compainsSection" class="content-section">
                    <!-- <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Complains</h2>
                    </div>

                    Brands Table -->
                    @include('admin.complains.com_list')

                </section>
            </div>
        </div>
    </div>
</body>
<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Sidebar toggle functionality
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarToggle = document.getElementById('sidebarToggle');

        sidebarToggle.addEventListener('click', function() {
            // sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });

        // Navigation functionality
        const navLinks = document.querySelectorAll('.nav-link');
        const contentSections = document.querySelectorAll('.content-section');

        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Remove active class from all links and sections
                navLinks.forEach(l => l.classList.remove('active'));
                contentSections.forEach(s => s.classList.remove('active'));

                // Add active class to clicked link and corresponding section
                this.classList.add('active');
                const sectionId = this.getAttribute('data-section') + 'Section';
                document.getElementById(sectionId)?.classList.add('active');
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        // Sidebar toggle functionality
        const sidebarCollapse = document.getElementById('sidebarCollapse');
        const sidebar = document.getElementById('sidebar');

        sidebarCollapse.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });

        // Handle sidebar links
        const sidebarLinks = document.querySelectorAll('#sidebar ul li a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                // Remove active class from all links
                sidebarLinks.forEach(l => l.parentElement.classList.remove('active'));
                // Add active class to clicked link
                this.parentElement.classList.add('active');
            });
        });
    });

    // Form handling functions
    function showForm(section) {
        const form = document.getElementById(`${section}Form`);
        if (form) {
            form.style.display = 'block';
            form.scrollIntoView({
                behavior: 'smooth'
            });
        }
    }

    function hideForm(section) {
        const form = document.getElementById(`${section}Form`);
        if (form) {
            form.style.display = 'none';
        }
    }

    function populateForm(section, data, readonly) {
        const form = document.getElementById(`${section}Form`);
        if (!form) return;

        // Loop through form elements and set values
        Object.keys(data).forEach(key => {
            const input = form.querySelector(`[name="${key}"]`);
            if (input) {
                input.value = data[key];
                input.readOnly = readonly;
            }
        });
    }


    // Notification function
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} position-fixed top-0 end-0 m-3`;
        notification.style.zIndex = '1050';
        notification.innerHTML = message;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.remove();
        }, 3000);
    }

    // Initialize tooltips and popovers
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    document.getElementById("toggleSidebar").addEventListener("click", function() {
        document.querySelector(".sidebar").classList.toggle("show");
    });
</script>

</html>