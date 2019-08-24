@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-md-12">
 <div class="panel panel-default" style="border-color:white;background-color:green;padding:15px;"><center style="color:white"> Invocie Details
 	 <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#myModal">
      create Invoice
</button>
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="color:blue;">Create Invoice</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
          <form  action="{{URL::to('/')}}/storeInvoice" method="POST">
                            {{ csrf_field() }}

        <div class="modal-body">
            
         <table class="table">
         	<tr>
         		 <td>Invocie Id</td>
         		 <td>:</td>
         		 <td><input type="text" name="invoiceid" class="form-control"  placeholder="invoiceid" required ></td>
         	</tr>
             <tr>
         		 <td>Order id</td>
         		 <td>:</td>
         		 <td><input type="text" name="orderid" class="form-control" placeholder="orderid" required ></td>
         	</tr>	<tr>
         		 <td>Suppler Name</td>
         		 <td>:</td>
         		 <td><input type="text" name="suppliername" class="form-control" placeholder="suppliername" required></td>
         	</tr>	<tr>
         		 <td>Product</td>
         		 <td>:</td>
         		 <td><input type="text" name="product" class="form-control" placeholder="product" required></td>
         	</tr>	<tr>
         		 <td>Quantity</td>
         		 <td>:</td>
         		 <td><input type="number" name="quantity" class="form-control" placeholder="quantity" id="quan"onkeyup="getgst()"  required></td>
         	</tr>	<tr>
         		 <td>Price</td>
         		 <td>:</td>
         		 <td><input type="number" name="price" class="form-control" placeholder="price" id="price" onkeyup="getgst()" required></td>
         	</tr>
         	<tr>
         		 <td>GST Percent</td>
         		 <td>:</td>
         		 <td><input type="text" name="gstpercent" class="form-control" placeholder="gstpercent" id="gst" onkeyup="getgst()" required></td>
         	</tr>
         	<tr>
         		 <td>Total Amount</td>
         		 <td>:</td>
         		 <td><input type="text" name="totalamount" class="form-control" placeholder="totalamount" id="total" required></td>
         	</tr>
         	<tr>
         		 <td>GST Amount</td>
         		 <td>:</td>
         		 <td><input type="text" name="gstamount" class="form-control" placeholder="gstamount" id="gstamount"  required></td>
         	</tr>
          <tr>
             <td>Bill Address</td>
             <td>:</td>
             <td><textarea  name="bill" class="form-control" placeholder="bill"  required></textarea></td>
          </tr>
           <tr>
             <td>ship Address</td>
             <td>:</td>
             <td><textarea  name="ship" class="form-control" placeholder="ship"  required></textarea></td>
          </tr>
         	
         </table>
         
              <center><button class="btn btn-sm btn-primary" type="submit">Submit</button></center>
         	
        </div>
          </form>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
</center>
 </div>
 <div class="panel-body">
   <table class="table">
   	     <thead>
   	    <th>Invocie Id</th>
   	    <th>Order id</th>
   	    <th>Suppler Name</th>
   	    <th>Product</th>
   	    <th>Quantity</th>
   	    <th>Price</th>
   	    <th>Total Amount</th>
   	    <th>GST Amount</th>
        <th>Action</th>

   	     </thead>
   	     <tbody>
          @foreach($data as $dump)
   	     	<tr>
   	     		 <td>{{$dump->invoiceid}}</td>
             <td>{{$dump->orderid}}</td>
             <td>{{$dump->suppliername}}</td>
             <td>{{$dump->product}}</td>
             <td>{{$dump->quantity}}</td>
             <td>{{$dump->price}}</td>

             <td>{{$dump->totalamount}}</td>
             <td>{{$dump->gstamount}}</td>
             <td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1{{$dump->id}}">Edit</a>
             <a type="button" href="{{ route('downloadTaxInvoice',['id'=>$dump->id]) }}" class="btn btn-success btn-xs"> TAX</a><br>
   	     		
   	     	</tr>
          @endforeach
   	     </tbody>
   	   
   </table>
    @foreach($data as $dump)
      <div class="modal" id="myModal1{{$dump->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="color:blue;">Create Invoice</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
          <form  action="{{URL::to('/')}}/updateinvoice?id={{$dump->id}}" method="POST">
                            {{ csrf_field() }}

        <div class="modal-body">
            
         <table class="table">
          <tr>
             <td>Invocie Id</td>
             <td>:</td>
             <td><input type="text" value="{{$dump->invoiceid}}" name="invoiceid" class="form-control"  placeholder="invoiceid" required ></td>
          </tr>
             <tr>
             <td>Order id</td>
             <td>:</td>
             <td><input type="text" value="{{$dump->orderid}}" name="orderid" class="form-control" placeholder="orderid" required ></td>
          </tr> <tr>
             <td>Suppler Name</td>
             <td>:</td>
             <td><input type="text" value="{{$dump->suppliername}}" name="suppliername" class="form-control" placeholder="suppliername" required></td>
          </tr> <tr>
             <td>Product</td>
             <td>:</td>
             <td><input type="text" value="{{$dump->product}}" name="product" class="form-control" placeholder="product" required></td>
          </tr> <tr>
             <td>Quantity</td>
             <td>:</td>
             <td><input type="number" value="{{$dump->quantity}}" name="quantity" class="form-control" placeholder="quantity" id="quan{{$dump->id}}" onkeyup="getgst('{{$dump->id}}')"  required></td>
          </tr> <tr>
             <td>Price</td>
             <td>:</td>
             <td><input type="number" value="{{$dump->price}}" name="price" class="form-control" placeholder="price" id="price{{$dump->id}}" onkeyup="getgst('{{$dump->id}}')" required></td>
          </tr>
          <tr>
             <td>GST Percent</td>
             <td>:</td>
             <td><input type="text" value="{{$dump->gstpercent}}" name="gstpercent" class="form-control" placeholder="gstpercent" id="gst{{$dump->id}}" onkeyup="getgst('{{$dump->id}}')" required></td>
          </tr>
          <tr>
             <td>Total Amount</td>
             <td>:</td>
             <td><input type="text" value="{{$dump->totalamount}}" name="totalamount" class="form-control" placeholder="totalamount" id="total{{$dump->id}}" required></td>
          </tr>
          <tr>
             <td>GST Amount</td>
             <td>:</td>
             <td><input type="text" value="{{$dump->gstamount}}" name="gstamount" class="form-control" placeholder="gstamount" id="gstamount{{$dump->id}}"  required></td>
          </tr>
            <tr>
             <td>Bill Address</td>
             <td>:</td>
             <td><textarea  name="bill" class="form-control" placeholder="gstamount"  required>{{$dump->bill}}</textarea></td>
          </tr>
           <tr>
             <td>ship Address</td>
             <td>:</td>
             <td><textarea  name="ship" class="form-control" placeholder="gstamount"  required>{{$dump->ship}}</textarea></td>
          </tr>
         </table>
         
              <center><button class="btn btn-sm btn-primary" type="submit">Submit</button></center>
          
        </div>
          </form>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  @endforeach
 </div>
<script type="text/javascript">
  function  getgst() {
       
       var price = document.getElementById('price').value;
       var quan = document.getElementById('quan').value;
       var gst = document.getElementById('gst').value;
           var finalgst = (gst/100);
        var total = (price * quan);
        var gstp =Math.round((total)*(finalgst)); 
             
          
     document.getElementById('total').value=total;
     document.getElementById('gstamount').value=gstp;


  }
</script>
<script type="text/javascript">
  function  getgst(arg) {
       
       var price = document.getElementById('price'+arg).value;
       var quan = document.getElementById('quan'+arg).value;
       var gst = document.getElementById('gst'+arg).value;
           var finalgst = (gst/100);
        var total = (price * quan);
        var gstp =Math.round((total)*(finalgst)); 
             
          
     document.getElementById('total'+arg).value=total;
     document.getElementById('gstamount'+arg).value=gstp;


  }
</script>
@endsection