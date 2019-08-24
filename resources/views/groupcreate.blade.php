@extends('layouts.app1')

@section('content')

<div class="col-sm-6">
            <create-group :initial-users="{{ $users }}"></create-group>
        </div>




@endsection