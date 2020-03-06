<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IbanFirst\RestServices;

class WalletsController extends Controller
{
    protected $restServices;

    public function __construct(RestServices $restServices)
    {
        //inject rest service that connect to api ibanfirst
    	$this->restServices = $restServices;
    }

    //redirect to view list wallets
    public function index()
    {
    	return view('wallet-list');
    }

    // Get ONE wallets BY ID 
    public function show($id)
    {    	
        $response = $this->restServices->findById('wallets/-',$id);
        if(empty($response)) return redirect('wallets'); 

        $wallet =$response->wallet;
    	return view('wallet-show', compact('wallet'));
    }

    //API Get all the wallets 
    public function allwallets(Request $request)
    {
        //query databale for server side 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $request->input('order.0.dir');
        $totalData = 100;             
        $totalFiltered =  $totalData; 
        //call api from rest service
        $response = $this->restServices->all('wallets/',['per_page'=>$limit,'page'=>($start/$limit)+1,'sort'=>$order]);
        
        $wallets=[];
        if(isset($response->wallets)) $wallets=$response->wallets;
        $data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $wallets  
            );
        return response()->json($data);
    }

    // get wallet balance by id wallet
    public function walletBalance($id,Request $request){

        $formattedDate =  $request->get('date');
        
        //call api from rest service
        $response = $this->restServices->all("wallets/-$id/balance/$formattedDate");
        
        if(empty($response)) return redirect('wallets/'.$id);

        $balance=[];
        if(isset($response->wallet))$balance=$response->wallet;

        return view('balance-wallet-show', compact('balance','id'));

    }   
}
