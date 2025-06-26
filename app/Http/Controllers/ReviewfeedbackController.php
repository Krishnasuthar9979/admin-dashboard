<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Review_feedback;
use Illuminate\Http\Request;

class ReviewfeedbackController extends Controller
{
    public function index()
    {
        //disply list of purchase_products:
        $products= Product::all();
        $customers= Customer::all();
        $rfs = Review_feedback ::with(['product','customer']); // Fetch all purchase_products
        return view('admin.review_feedbacks.rf_list',compact('rfs','customers','products')); // Pass purchase_products to the view
    }
}