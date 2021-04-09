@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading" >Create Or Update Product</div>
                        <div class="panel-body">
                            <div class="row"   bgcolor="#f0f8ff">
                                <form action="{{ !empty($product)
                                ?route('products.update', $product->id)
                                :route('products.store')
                                }}" method="POST">

                                    {{ csrf_field() }}
                                    @if(!empty($product))
                                        @method('PUT')
                                        <input  type="hidden" name="id" id="id" value="{{ $product->id}}">
                                    @else
                                        @method("POST")
                                    @endif
                                    <div class="col-md-4" bgcolor="#f0f8ff">
                                        <div style="padding:20px; text-align:left" class="row" float="left">
                                            name :
                                        </div>
                                        <div style="padding:20px" class="row">
                                            <input  type="text" name="name" id="name" value="{{!empty($product)? $product->name:null}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4"   bgcolor="#f0f8ff">
                                        <div  style="padding:20px; text-align:left" class="row">
                                            cost :
                                        </div>
                                        <div  style="padding:20px" class="row">
                                            <input  type="text" name="cost" id="cost" value="{{ !empty($product)? $product->cost:null}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4"   bgcolor="#f0f8ff">
                                        <div style="padding:20px; text-align:left" class="row">
                                            option :
                                        </div>
                                        <div  style="padding:20px" class="row ">
                                            <select name="option_id" id="option_id" value="{{!empty($product)? $product->option->name:null}}">
                                                @foreach ($options as $option)
                                                    <option value="{{ $option->id}}">{{ $option->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4"   bgcolor="#f0f8ff">
                                        <div style="padding:20px; text-align:left" class="col-md-4">
                                            <input  type="submit" value="apply" name="submit" id="submit">
                                        </div>
                                    </div>
                                </form>
                                @if(!empty($product))
                                <form action="{{ route('products.destroy', $product->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <input  type="submit" value="delete" name="submit" id="submit">
                                </form>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
    </div>
@endsection
