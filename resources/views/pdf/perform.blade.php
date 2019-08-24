<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TAX Invoice</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{
            font-size: 11px;
        }
        table {
    border-collapse: collapse;
    border: 1px solid black;
  }
  th, td {
    border: 1px solid black;
  }
    </style>
</head>
<body>


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h4 style="background-color:#4c4c4c;padding:3px;margin-top: -20px;" class="text-center">TAX INVOICE</h4> 
           
            <div class="pull-left" style="padding-top: 20px;">
                <b>Expostores Pvt. Ltd.</b>
            </div>
            <div class="pull-right text-right col-md-6">
                <img height="35px" width="250px" src="https://expostores.com/wp-content/uploads/2017/09/expostores-logo.png" alt="">
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
           
            <div class="pull-left">
              
                <br>
               2nd Floor,No.77,West of Chord Road,Beside,<br>
                Mahalakshmi ,Layout Metro Station 1st R Block Rajajinagar<br> 
                Bangalore-560010<br>
                <b>GST : </b><br>
                Email : <br>
            </div>
           
            
            <div class="pull-right">

               <div style="padding-right: 55px;"> Invoice No :{{$data['products']['invoiceid']}} <br>
              
               Date :{{$data['products']['created_at']}} 
                <br>
                                       
            </div>
            </div>
            
        </div>
    </div><br>
    <div class="row">
      
        <div class="col-md-6 col-md-offset-3">
            <div class="pull-left">
                <b>BILL TO : </b>
                   <?php
                        echo wordwrap($data['products']['bill'],40,"<br>\n");
                    ?>
                    <br><b>
                <b> GST : </b>
            </div>
            <div class="pull-right" style="padding-right: 20px;" >
                <b> SHIP TO :</b> <?php
                        echo wordwrap($data['products']['ship'],40,"<br>\n");
                    ?>
                    <br><b> </b><br>
                  
                   
            </div>
        </div>
      
        <br><br><br><br><br><br><br>
       
            <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <table class="table" border="1">
                    <thead >
                        <tr style="background-color:#e6e6e6">
                            <th>SL.NO</th>
                            <th colspan="2">DESCRIPTION OF GOODS</th>
                            <th>HSN/SAC
                                 
                            </th>
                            <th>UNIT</th>
                            <th colspan="2" >QUANTITY</th>
                            <th>RATE/UNIT</th>
                            <th >AMOUNT(<img src="https://cdn3.iconfinder.com/data/icons/indian-rupee-symbol/800/Indian_Rupee_symbol.png" width="8px" height="10px" style="margin-top: 4px;">)</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                 
                        <tr>
                            <td class="text-center">1</td>
                            <td colspan="2">{{$data['products']['product']}}</td>
                            <td>-</td>
                            <td>-</td>
                            <td colspan="2">{{$data['products']['quantity']}}</td>
                            <td>{{$data['products']['price']}}</td>
                            <td >{{$data['products']['totalamount']}}</td>
                        </tr>
                
                        <tr>
                            <td colspan="5" rowspan="6"></td>
                            <td colspan="2" class="text-left"><b>GROSS AMOUNT</b></td>
                            <?php  $f = $data['products']['gstamount']; 
                                  $c = $data['products']['totalamount'] - $f;
                                  $m= $data['products']['gstpercent']/2;
                            ?>
                            <td class="text-left"></td>
                            <td  class="text-left">{{$c}}</td>
                        </tr>
                        <!-- <tr>
                            <td class="text-left">Discount Amount</td>
                            <td class="text-left"></td>
                            <td class="text-left"></td>
                        </tr> -->
                        <tr>
                            <td colspan="2" class="text-left"><b>TOTAL AMOUNT</b></td>
                            <td class="text-left"></td>
                            <td  class="text-left">{{$c}}</td>
                        </tr>
                        <tr>
                        <td colspan="2" class="text-left">CGST {{$m}}%

                           <?php  $f = $data['products']['gstamount']/2 ; ?>
                           
                           
                        </td>
                            <td class="text-left"></td>
                            <td  class="text-left">
                           {{$f}}
                      </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-left">SGST {{$m}}%
                              
                         
                           
                        </td>
                            <td class="text-left"></td>
                            <td  class="text-left">
                          {{$f}}
                        </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-left">IGST {{$data['products']['gstpercent']}}%
                               
                               
                              
                            </td>
                            <td class="text-left"></td>
                            <td  class="text-left">
                               -
                               
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-left"><b>TOTAL</b></td>
                            <td class="text-left"></td>
                            <td  class="text-left">{{$data['products']['totalamount']}}</td>
                        </tr>
                      
                      
                        <tr class="clearfix">
                            <td colspan="9">
                               
                               
                                <div class="pull-left col-md-6 clearfix">
                                    <i><b>Terms And Conditions</b></i>
                                    <br>
                                    Tax invoice will be provided once goods gets delivered<br>
                                    Reward Points are not Applicable for Offer Price<br>
                                    This is just for a reference, which is not applicable for GST Claiming<br>
                                    
                                    
                                </div>
                             

                               
                                
                               <br><br><br><br>
                               <br><br><br><br><br><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" class="text-center">This is a computer generated invoice</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>