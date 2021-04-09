@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

                <div class="panel panel-default">
                    <div class="panel-heading" >Options</div>
                    <div class="panel-body">
                        <div class="row"   bgcolor="#f0f8ff">
                            <div style="padding: 1%" class="col-md-4">
                                <span>
                                 <a href="{{route('options.create')}}"> Add option</a>
                                <hr>
                                </span>
                            </div>
                        @forelse ($options as $option)
                            <div style="padding: 1%" class="col-md-4">
                                    <span> <a href="{{url('api/options/'.$option->id.'/edit')}}">
                                        {{ $option->name }} :
                                            @foreach ($option->choices as $choice)
                                            , {{ $choice->name}}
                                            @endforeach
                                         </a><hr>
                                    </span>
                            </div>
                                @empty
                                No product found!
                                @endforelse

                                {!! $options->links() !!}
                        </div>
                    </div>
                </div>
            </div>

    </div>
@endsection
