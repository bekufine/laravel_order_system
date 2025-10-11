<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        // this functu¥ion is to fetch data from db 
    }

    public function store(Request $request){
        
        
        $validated = $request ->validate([
            'hotel_id'=>'required',
            'dep_id'=>'required',
            'coor_id'=>'required',
            'event_date'=>'required',
            'work_start_time'=>'required',
            'work_end_time'=>'required',
            'workers_number'=>'required|integer',
            'venue_name'=>'required',
            'event_start_time'=>'required',
            'event_end_time'=>'required',
            'guests_number'=>'required|integer',
            'duty_content'=>'required',
            'position'=>'required',
            'comments'=>'nullable'

        ]); 
        // dd($validated);
        Order::create($validated);
        return redirect()->back()->with("success", 'Order is completed!!');
        
    }
    public function update(){
        // this functu¥ion is to update data from db 
        // |integer|min:1
    }

}
