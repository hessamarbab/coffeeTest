@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

                <div class="panel panel-default">
                    <div class="panel-heading" >Products</div>
                    <div class="panel-body">
<div class="row"   bgcolor="#f0f8ff">
@forelse ($products as $product)
    <div style="padding: 1%" class="col-md-4">

        <span> <a href="{{url('api/product/'.$product->id)}}">
            {{ $product->name }} : {{ $product->option->name}}
            @foreach ($product->option->choices as $choice)
            {{ $choice->name}}
            @endforeach
            <span>cost : {{ $product->cost}}.{{ $product->sent}}$</span>
        </a><hr></span>

    </div>
        @empty
          No product found!
@endforelse
    {!! $products->links() !!}
</div>
                    </div>
                </div>
            </div>

    </div>
@endsection
