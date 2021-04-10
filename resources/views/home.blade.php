@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div class="panel-body">
                    <div class="row"   bgcolor="#f0f8ff">
                        <div style="padding: 1%" class="col-md-4">
                            <span>
                             <a href="{{route('products.index')}}"> Products</a>
                            <hr>
                            </span>
                            <span>
                             <a href="{{route('options.index')}}"> Options</a>
                            <hr>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
