@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

                <div class="panel panel-default">
                    <div class="panel-heading" >Orders</div>
                    <div class="panel-body">
                        <div class="row"   bgcolor="#f0f8ff">

                        @forelse ($orders as $order)
                            <div style="padding: 1%" class="col-md-12">
                                    <span>
                                        user: {{ $order->user->name }} =>
                                         {{$order->product->name}}>
                                         {{$order->product->option->name}}:
                                         {{$order->choice->name}}><br/>
                                         cost: {{$order->product->cost}}
                                        </a>
                                    </span>

                                <form action="{{route('orders.change_status',$order->id)}}" method="POST">
                                    @method('POST')
                                    {{ csrf_field() }}

                                        <span>
                                            status :
                                            <select name="status" id="option_id">
                                                @foreach ($statuses as $status)
                                                    <option value="{{$status}}"
                                                     @if($status==$order->status)
                                                        selected="selected"
                                                     @endif
                                                     >{{ $status}}</option>
                                                @endforeach
                                            </select>
                                            <input type="submit" value="change">
                                        </span>
                                </form>
                                <hr/>
                            </div>
                                @empty
                                No product found!
                                @endforelse

                                {!! $orders->links() !!}
                        </div>
                    </div>
                </div>
            </div>

    </div>
@endsection
