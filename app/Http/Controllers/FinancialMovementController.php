<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IbanFirst\RestServices;

class FinancialMovementController extends Controller
{
    //new RestServices();
    protected $restServices;

    public function __construct(RestServices $restServices)
    {
    	$this->restServices = $restServices;
    }
    public function index()
    {
    	return view('financial-movements-list');
    }
    public function show($id)
    {
    	// Get all the financialMovements
        $response = $this->restServices->findById('financialMovements/-',$id);

        if(empty($response)) return redirect('financial-movements');      
        $financialMovement =$response->financialMovement;   
        return view('financial-movements-show', compact('financialMovement'));
    }

    //API Get all the financial Movements 
    public function allfinancialMovements(Request $request)
    {
        //query databale for server side
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $request->input('order.0.dir');
        $totalData = 100;           
        $totalFiltered =  $totalData; 
        //call api from rest service
        $response = $this->restServices->all('financialMovements/',['per_page'=>$limit,'page'=>($start/$limit)+1,'sort'=>$order]);
        
        $financialMovements=[];
        if(isset($response->financialMovements)) $financialMovements=$response->financialMovements;
        
        $data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $financialMovements   
            );
        return response()->json($data);
    }
}
