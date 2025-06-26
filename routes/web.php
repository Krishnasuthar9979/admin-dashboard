<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\EmployeeProfileController;
use App\Http\Controllers\Purchase_productController;
use App\Http\Controllers\ReviewfeedbackController;
use App\Http\Controllers\SaleproductController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminOrderdetailController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\EmployeeLoginController;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\AdminSubcategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminOfferController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\FramesController;
use App\Http\Controllers\PrescriptionsController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\EmployeeController;


//customer side 
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;

Route::get('/admin/complains/com_list', [ComplainController::class, 'index'])->name('admin.complains.com_list');
Route::get('/admin/products/search', [AdminProductController::class, 'search'])->name('admin.products.search');

Route::prefix('admin/suppliers')->group(function () {
    Route::get('/slist', [SupplierController::class, 'index']);
    Route::get('/sadd', [SupplierController::class, 'create']);
    Route::post('/sadd', [SupplierController::class, 'store'])->name('admin.suppliers.store');
    Route::delete('/destroy/{s_id}', [SupplierController::class, 'destroy'])->name('admin.suppliers.destroy');
    Route::put('/sedit/{s_id}', [SupplierController::class, 'update'])->name('admin.suppliers.update');
    Route::get('/sedit/{s_id}', [SupplierController::class, 'edit']);
});

Route::prefix('admin/customers')->group(function () {
    Route::get('/clist', [AdminCustomerController::class, 'index']);
    Route::delete('/destroy/{c_id}', [AdminCustomerController::class, 'destroy'])->name('admin.customers.destroy');
    Route::put('/cedit/{c_id}', [AdminCustomerController::class, 'update'])->name('admin.customers.update');
    Route::get('/cedit/{c_id}', [AdminCustomerController::class, 'edit']);
});
Route::prefix('admin/shipping')->group(function () {
    Route::get('/shiplist', [ShippingController::class, 'index']);
    Route::get('/shipadd', [ShippingController::class, 'create']);
    Route::post('/shipadd', [ShippingController::class, 'store'])->name('admin.shipping.store');
    Route::delete('/destroy/{ship_id}', [ShippingController::class, 'destroy'])->name('admin.shipping.destroy');
    Route::put('/shipedit/{ship_id}', [ShippingController::class, 'update'])->name('admin.shipping.update');
    Route::get('/shipedit/{ship_id}', [ShippingController::class, 'edit']);
});

Route::prefix('admin/bills')->group(function (){
    Route::get('/blist', [BillController::class, 'index']);
    Route::get('/badd', [BillController::class, 'create']);
    Route::post('/badd', [BillController::class, 'store'])->name('admin.bills.store');
    Route::delete('/destroy/{bill_id}', [BillController::class, 'destroy'])->name('admin.bills.destroy');
    Route::put('/bedit/{bill_id}', [BillController::class, 'update'])->name('admin.bills.update');
    Route::get('/bedit/{bill_id}', [BillController::class, 'edit']);
});

Route::prefix('admin/orders')->group(function () {
    Route::get('/olist', [AdminOrderController::class, 'index']); // Show customer list
    Route::post('/oedit/{o_id}', [AdminOrderController::class, 'update'])->name('admin.orders.update'); // Update customer
    Route::get('/oedit/{o_id}', [AdminOrderController::class, 'edit']); // Edit customer
    Route::delete('/destroy/{o_id}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy'); // Delete customer
});
Route::prefix('admin/orderdetails')->group(function () {
    Route::get('/od_list', [AdminOrderdetailController::class, 'index']); // Show customer list
    Route::delete('/destroy/{o_id}', [AdminOrderdetailController::class, 'destroy'])->name('admin.orderdetails.destroy'); // Delete customer
});

Route::prefix('admin/products')->group(function () {
    //Sub Categories
    Route::get('/plist', [AdminProductController::class, 'index'])->name('admin.products.plist');
    Route::get('/padd', [AdminProductController::class, 'create']);
    Route::post('/padd', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::delete('/destroy/{p_id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::put('/pedit/{p_id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::get('/pedit/{p_id}', [AdminProductController::class, 'edit'])->name('admin.products.edit');
});

Route::prefix('admin/purchase_products')->group(function (){
    Route::get('/purpro_list', [Purchase_productController::class, 'index']);
    Route::get('/purpro_add', [Purchase_productController::class, 'create']);
    Route::post('/purpro_add', [Purchase_productController::class, 'store'])->name('admin.purchase_products.store');
    Route::delete('/destroy/{supplier_pid}', [Purchase_productController::class, 'destroy'])->name('admin.purchase_products.destroy');
    Route::put('/purpro_edit/{supplier_pid}', [Purchase_productController::class, 'update'])->name('admin.purchase_products.update');
    Route::get('/purpro_edit/{supplier_pid}', [Purchase_productController::class, 'edit']);
    Route::get('/purchase_search',[Purchase_productController::class, 'purchase_search'])->name('admin.purchase_products.purchase_search');
});

Route::prefix('admin/sale_products')->group(function (){
    Route::get('/salepro_list', [SaleproductController::class, 'index']);
    Route::get('/sale_report',[SaleproductController::class, 'sale_report']);
    Route::get('/sale_search',[SaleproductController::class, 'sale_search'])->name('admin.sale_poducts.sale_search');
    Route::get('/exportPDF',[SaleproductController::class, 'exportPDF']);
});

Route::prefix('admin/review_feedbacks')->group(function (){
    Route::get('/rf_list', [ReviewfeedbackController::class, 'index']);
});

Route::prefix('admin/prescriptions')->group(function () {
    //Sub Categories
    Route::get('/prelist', [PrescriptionsController::class, 'index'])->name('admin.prescriptions.prelist');
    Route::get('/preadd', [PrescriptionsController::class, 'create']);
    Route::post('/preadd', [PrescriptionsController::class, 'store'])->name('admin.prescriptions.store');
    Route::delete('/destroy/{prescription_id}', [PrescriptionsController::class, 'destroy'])->name('admin.prescriptions.destroy');
    Route::put('/preedit/{prescription_id}', [PrescriptionsController::class, 'update'])->name('admin.prescriptions.update');
    Route::get('/preedit/{prescription_id}', [PrescriptionsController::class, 'edit']);
});

Route::prefix('admin/categories')->group(function () {
    Route::get('/catlist', [AdminCategoryController::class, 'index']);
    Route::get('/catadd', [AdminCategoryController::class, 'create']);
    Route::post('/catadd', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::delete('/destroy/{category_id}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::put('/catedit/{category_id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::get('/catedit/{category_id}', [AdminCategoryController::class, 'edit']);
});
Route::prefix('admin/subcategories')->group(function () {
    //Sub Categories
    Route::get('/subcate_list', [AdminSubcategoryController::class, 'index'])->name('admin.subcategories.subcate_list');
    Route::get('/subcate_add', [AdminSubcategoryController::class, 'create']);
    Route::post('/subcate_add', [AdminSubcategoryController::class, 'store'])->name('admin.subcategories.store');
    Route::delete('/destroy/{subcategory_id}', [AdminSubcategoryController::class, 'destroy'])->name('admin.subcategories.destroy');
    Route::put('/subcate_edit/{subcategory_id}', [AdminSubcategoryController::class, 'update'])->name('admin.subcategories.update');
    Route::get('/subcate_edit/{subcategory_id}', [AdminSubcategoryController::class, 'edit']);
});

Route::get('admin/Loginadmin/login', [AdminLoginController::class, 'ShowLoginForm'])->name('admin.Loginadmin.login');  
Route::post('admin/Loginadmin/login', [AdminLoginController::class,'login'])->name('admin.Loginadmin.login');
Route::get('admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

Route::get('admin/logout', [AdminLoginController::class, 'logout']);

Route::get('admin/adminlist',[AdminProfileController::class,'index']);
Route::get('admin/adminedit/{a_id}',[AdminProfileController::class,'edit'])->name('admin.adminedit.edit');
Route::put('admin/adminedit/{a_id}',[AdminProfileController::class,'update'])->name('admin.adminedit.update');
Route::get('admin/Loginadmin/changepass', [AdminLoginController::class, 'changepass']);


Route::get('employees/Loginemployee/login', [EmployeeLoginController::class, 'ShowLoginForm'])->name('employees.Loginemployee.login');  
Route::post('employees/Loginemployee/login', [EmployeeLoginController::class,'login'])->name('employees.Loginemployee.login');
Route::get('employees/dashboard', [EmployeeDashboardController::class, 'index'])->name('employees.dashboard');
Route::get('employees/logout', [EmployeeLoginController::class, 'logout']);
Route::get('employees/profile',[EmployeeProfileController::class,'index']);
Route::get('employees/empedit/{e_id}',[EmployeeProfileController::class,'edit'])->name('employees.empedit.edit');
Route::put('employees/empedit/{e_id}',[EmployeeProfileController::class,'update'])->name('employees.empedit.update');
// Route::get('admin/adminedit/{a_id}',[AdminProfileController::class,'edit']);
// Route::put('admin/adminedit/{a_id}',[AdminProfileController::class,'update'])->name('admin.adminedit.update');

Route::get('employees/customers/clist', [EmployeeController::class, 'viewcustomer'])->name('employees.customers.clist');
Route::get('employees/suppliers/slist', [EmployeeController::class, 'viewsupplier'])->name('employees.suppliers.slist');
Route::get('employees/employees/emplist', [EmployeeController::class, 'viewemployee'])->name('employees.employees.emplist');
Route::get('employees/prescriptions/prelist', [EmployeeController::class, 'viewprescriptions'])->name('employees.prescriptions.prelist');
Route::get('employees/orders/olist', [EmployeeController::class, 'vieworder'])->name('employees.orders.olist');
Route::get('employees/orderdetails/od_list', [EmployeeController::class, 'vieworderdetail'])->name('employees.orderdetails.od_list');
Route::get('employees/shipping/shiplist', [EmployeeController::class, 'viewshipping'])->name('employees.shipping.shiplist');
Route::get('employees/bills/blist', [EmployeeController::class, 'viewbill'])->name('employees.bills.blist');


 Route::prefix('admin/offers')->group(function () {
     Route::get('/offerlist', [AdminOfferController::class, 'index']);
     Route::get('/offeradd', [AdminOfferController::class, 'create']);
     Route::post('/offeradd', [AdminOfferController::class, 'store'])->name('admin.offers.store');
     Route::get('/destroy/{offer_id}', [AdminOfferController::class, 'destroy'])->name('admin.offers.destroy');
     Route::put('/offeredit/{offer_id}', [AdminOfferController::class, 'update'])->name('admin.offers.update');
     Route::get('/offeredit/{offer_id}', [AdminOfferController::class, 'edit']);
 });

 Route::prefix('admin/brands')->group(function () {
    Route::get('/brandlist', [BrandsController::class, 'index']);
    Route::get('/brandadd', [BrandsController::class, 'create']);
    Route::post('/brandadd', [BrandsController::class, 'store'])->name('admin.brands.store');
    Route::delete('/destroy/{brand_id}', [BrandsController::class, 'destroy'])->name('admin.brands.destroy');
    Route::put('/brandedit/{brand_id}', [BrandsController::class, 'update'])->name('admin.brands.update');
    Route::get('/brandedit/{brand_id}', [BrandsController::class, 'edit']);
});

Route::prefix('admin/employees')->group(function () {
    Route::get('/emplist', [EmployeeController::class, 'index']);
    Route::get('/empadd', [EmployeeController::class, 'create']);
    Route::post('/empadd', [EmployeeController::class, 'store'])->name('admin.employees.store');
    Route::delete('/destroy/{e_id}', [EmployeeController::class, 'destroy'])->name('admin.employees.destroy');
    Route::put('/empedit/{e_id}', [EmployeeController::class, 'update'])->name('admin.employees.update');
    Route::get('/empedit/{e_id}', [EmployeeController::class, 'edit']);
});

Route::prefix('admin/frames')->group(function () {
    Route::get('/framelist', [FramesController::class, 'index']);
    Route::get('/frameadd', [FramesController::class, 'create']);
    Route::post('/frameadd', [FramesController::class, 'store'])->name('admin.frames.store');
    Route::delete('/destroy/{frame_id}', [FramesController::class, 'destroy'])->name('admin.frames.destroy');
    Route::put('/frameedit/{frame_id}', [FramesController::class, 'update'])->name('admin.frames.update');
    Route::get('/frameedit/{frame_id}', [FramesController::class, 'edit']);
});

Route::get('admin/products/lowstock', [AdminProductController::class, 'lowStock'])->name('admin.products.lowstock');
Route::get('admin/products/outofstock', [AdminProductController::class, 'outOfStock'])->name('admin.products.outofstock');
Route::get('admin/admin_login_notification', [AdminLoginController::class, 'login'])->name('admin.login');
// //customer side

// Route::get('register', [CustomerController::class, 'showRegistrationForm'])->name('register');

// // Handle registration form submission
// Route::post('register', [CustomerController::class, 'register'])->name('register.submit');

// // Show login form
// Route::get('login', [CustomerController::class, 'showLoginForm'])->name('login');

// // Handle login form submission
// Route::post('login', [CustomerController::class, 'login'])->name('login.submit');



// // Logout route
// Route::post('logout', [CustomerController::class, 'logout'])->name('logout');
// Route::get('/products/index', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/Eyeglass', [ProductController::class, 'showEyeglasses']);
// Route::get('/products/Sunglasses', [ProductController::class, 'showSunglasses']);
// Route::get('/products/Contactlense', [ProductController::class, 'Contactlenses']);
// Route::get('/products/Reading', [ProductController::class, 'readingglass']);
// Route::get('/products/Screenglass', [ProductController::class, 'screenglass']);
// // Route::get('/cart', [CartController::class, 'showCart']);
// // Route::post('/cart', [CartController::class, 'addToCart']);




// Route::get('/home', function () {
//     return view('home');
// })->name('home');

//         // Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
//         Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
//         Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    

//         Route::get('/products/product_details/{p_id}', [ProductController::class, 'show']);

//         Route::post('/add-to-cart/{cart_id}', [CartController::class, 'addToCart'])->name('cart.add');
//         Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
//         Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
//         Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
//         Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

       

       
        

//         // Route::GET('/checkout', [CheckoutController::class, 'checkout'])->name('checkout'); // GET - Show checkout page
//         // Route::POST('/checkout/store', [CheckoutController::class, 'storeShippingInfo'])->name('checkout.store'); // POST - Save shipping info
//         // Route::post('/order/place', [CheckoutController::class, 'placeOrder'])->name('order.place'); // POST - Place order
//         // Route::get('/order/success', [CheckoutController::class, 'orderSuccess'])->name('order.success');

//         // Route::middleware(['auth:customer'])->group(function () {
//         //     Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout');
//         //     Route::post('/checkout', [CheckoutController::class, 'storeShipping'])->name('checkout.store');
//         // });

//         // Route::get('/checkout/{p_id}/{price}', [OrderController::class, 'checkout'])->name('orders.checkout');

//         // Route::get('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');


//         // Route::get('/checkout', [OrderController::class, 'create'])->name('orders.checkout');
//         // Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');        
//         // Route::post('/checkout', [OrderController::class, 'processCheckout'])->name('orders.processCheckout');
//         // Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');


//         // Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
//         // Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');


//         Route::post('/place-Order/{p_id}', [OrderController::class, 'placeOrder'])->name('place.order');
//         Route::get('/checkout/{p_id}', [OrderController::class, 'checkout'])->name('orders.checkout');

//         // Route::get('orders/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
//         // Route::post('/orders', [OrderController::class, 'placeOrder'])->name('orders.place');
//         // Route::get('/checkout/{order_id}', [OrderController::class, 'checkout'])->name('checkout');
//         Route::get('/order-success', function () {
//             return view('orders.success');
//         })->name('orders.success');

