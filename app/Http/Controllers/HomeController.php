<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use App\Invoice;
use PDF;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.use App\Group;
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home',['users'=>User::all()]);
    }
    public function index1()
    {
        $groups = auth()->user()->groups;

        $users = User::where('id', '<>', auth()->user()->id)->get();
        $user = auth()->user();

        return view('home1', ['groups' => $groups, 'users' => $users, 'user' => $user]);
    }
    public function getconversions(request $request){

             $data = Conversation::where('group_id',$request->group_id)->get();
             return response()->json($data);

    }
    public function groupcreate(){
            $users = User::all();
        return view('/groupcreate',['users'=>$users]);
    }
    public function invoice(){

           $data =Invoice::all(); 

        return view('/invocie.invoice',['data'=>$data]);
    }
    public function storeInvoice(request $request){
       
$data = new Invoice;
$data->invoiceid = $request->invoiceid;
$data->orderid = $request->orderid;
$data->suppliername = $request->suppliername;
$data->product = $request->product;
$data->quantity = $request->quantity;
$data->price = $request->price;
$data->gstpercent = $request->gstpercent;
$data->totalamount = $request->totalamount;
$data->gstamount = $request->gstamount;
$data->bill = $request->bill;

$data->ship = $request->ship;

$data->save();

  return back();
    }
     public function updateinvoice(request $request){
       
$data = Invoice::findOrFail($request->id);
$data->invoiceid = $request->invoiceid;
$data->orderid = $request->orderid;
$data->suppliername = $request->suppliername;
$data->product = $request->product;
$data->quantity = $request->quantity;
$data->price = $request->price;
$data->gstpercent = $request->gstpercent;
$data->totalamount = $request->totalamount;
$data->gstamount = $request->gstamount;
$data->bill = $request->bill;
$data->ship = $request->ship;

$data->save();

  return back();
    }
  
    function downloadTaxInvoice(Request $request){
         $products = Invoice::where('id',$request->id)->first()->getOriginal();
         
        $data = array(
            'products'=>$products);
      
        view()->share('data',$data);
        $pdf = PDF::loadView('pdf.perform')->setPaper('a4','portrait');
        if($request->has('download')){
            return $pdf->download(time().'.pdf');
        }else{
            return $pdf->stream('TaxInvoice'.'('.$request->id.')'.'.pdf');
        }
    }

    
}
