@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading" >Admin Panel</div>
                        <div class="panel-body">
                            <div class="row"   bgcolor="#f0f8ff">

                                    <div class="col-md-4" bgcolor="#f0f8ff">
                                        <div style="padding:20px; text-align:left" class="row" float="left">
                                            <a href="{{route('products.index')}}">Products</a>
                                        </div>
                                        <div style="padding:20px; text-align:left" class="row" float="left">
                                            <a href="{{route('options.index')}}">Options</a>
                                        </div>
                                    </div>


                            </div>
                        </div>
                </div>
            </div>
    </div>
@endsection
