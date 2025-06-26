<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminOfferController extends Controller
{
    public function index()
    {
        //disply list of offers:
        $offers = Offer ::all(); // Fetch all offers
        return view('admin.offers.offerlist',['offers'=>$offers]); // Pass offers to the view
    }

    public function create(){
        return view('admin.offers.offeradd');
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'discount_percentage' => 'required|numeric|min:0|max:100',
        //     'start_date' => 'required|date',
        //     'end_date' => 'required|date|after_or_equal:start_date',
        //     'status' => 'required|in:active,inactive',
        // ]);

        // Offer::create($validatedData);

        // return response()->json(['success' => 'Offer added successfully!']);
        $offers = new Offer();
        $offers ->title = $request -> title;
        $offers ->description = $request -> description;
        $offers ->discount_percentage = $request -> discount_percentage;
        $offers ->start_date = $request -> start_date;
        $offers ->end_date = $request -> end_date;
        $offers ->status = $request -> status;
        $offers ->description = $request -> description;
        $offers -> save();

        return redirect("admin/dashboard")->with('success', 'Offer Inserted Successfully.');
    }

    public function show(string $id){
        //
    }

    public function edit(string $offer_id){
        //$offers = DB::table("offers")->where("offer_id",$offer_id);
        // $offer = Offer::with($offer_id); // Fetch all offers
         //return view('admin.offers.offeredit',['offer'=>$offers]);
         $offers = DB::table('offers')->where('offer_id', $offer_id)->first();
         $offers->start_date = Carbon::parse($offers->start_date);
         $offers->end_date = Carbon::parse($offers->end_date);
         return view('admin.offers.offeredit', ['offer'=>$offers]);
    }

    public function update(Request $request,string $offer_id)
    {
        $offers = DB::table("offers")->where("offer_id",$offer_id)->update([
            'title' => $request -> title,
            'description' =>  $request -> description,
            'discount_percentage' => $request -> discount_percentage,
            'start_date' => $request -> start_date,
            'end_date' => $request -> end_date,
        ]);
    
        return redirect("admin/dashboard")->with('success', 'Offer Updated Successfully.');
        // $validatedData = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'discount_percentage' => 'required|numeric|min:0|max:100',
        //     'start_date' => 'required|date',
        //     'end_date' => 'required|date|after_or_equal:start_date',
        //     'status' => 'required|in:active,inactive',
        // ]);

        // $offer->update($validatedData);

        // return response()->json(['success' => 'Offer updated successfully!']);
    }

    public function destroy(string $offer_id)
    {
        //$offers=Offer::findOrFail($offer_id);
       // $offers->delete();
        //dd('Method is called',$offer_id);
        DB::table("offers")->where("offer_id",$offer_id)->delete();

       // $offer = Offer :: find($offer_id);
       //$offer->delete();

        return redirect("admin/dashboard")->with('danger', 'Offer Deleted Successfully.');
    }
}
