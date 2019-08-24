@extends('layouts.app')

@section('content')
<div class="container">

             
       
    <div class="row justify-content-center">
        <div class="col-sm-12">
                <a href="{{URL::to('/')}}/invoice" class="btn btn-sm btn-warning pull-right">Create Invoice</a>
                <div class="card-body" id="app">

                   <chat-app :user="{{ Auth::user() }}"></chat-app> 
                   
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection

