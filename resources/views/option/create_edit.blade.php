@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading" >Create Or Update Option</div>
                        <div class="panel-body">
                            <div class="row"   bgcolor="#f0f8ff">
                                <form action="{{
                                    !empty($option)
                                    ? route('options.update', $option->id)
                                    : route('options.store')
                                    }}" method="POST">
                                    {{ csrf_field() }}
                                    @if (!empty($option))
                                         @method('PUT')
                                         <input  type="hidden" name="id" id="id" value="{{ $option->id}}">
                                    @else
                                        @method("POST")
                                    @endif
                                    <div class="col-md-4" bgcolor="#f0f8ff">
                                        <div style="padding:20px; text-align:left" class="row" float="left">
                                            name :
                                        </div>
                                        <div style="padding:20px" class="row">
                                            <input  type="text" name="name" id="name" value="{{ !empty($option)? $option->name:null}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4"   bgcolor="#f0f8ff">
                                        <div style="padding:20px; text-align:left" class="col-md-4">
                                            <input  type="submit" value=" apply " name="submit" id="submit">
                                        </form>
                                        @if (!empty($option))
                                        <form action="{{ route('options.destroy', $option->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <input  type="submit" value="delete" name="submit" id="submit">
                                        </form>
                                        @endif
                                        </div>
                                    </div>
                                    @if (!empty($option))
                                    <div class="col-md-4" bgcolor="#f0f8ff">
                                        <div style="padding:20px; text-align:left" class="row" float="left">
                                            choices :
                                        </div>
                                        @foreach ($option->choices as $choice)
                                            <div style="padding:20px" class="row">
                                                <a  href="{{url('api/choices/'.$choice->id.'/edit')}}">{{ $choice->name}}</a>
                                            </div>
                                        @endforeach
                                        <div style="padding:20px" class="row">
                                            <a  href="{{url('api/choices/create//?option_id='.$option->id)}}">add new choice</a>
                                        </div>
                                    </div>
                                    @endif
                            </div>
                        </div>
                </div>
            </div>
    </div>
@endsection
