@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading" >Create Or Update Choice</div>
                        <div class="panel-body">
                            <div class="row"   bgcolor="#f0f8ff">
                                <form action="{{
                                    !empty($choice)
                                    ? route('choices.update', $choice->id)
                                    : route('choices.store')
                                    }}" method="POST">
                                    {{ csrf_field() }}
                                    @if (!empty($choice))
                                        @method("PUT")
                                        <input  type="hidden" name="id" id="id" value="{{ $choice->id}}">
                                    @else
                                        @method("POST")
                                        <input  type="hidden" name="option_id" id="option_id" value="{{ $option->id}}">
                                    @endif
                                    <div class="col-md-4" bgcolor="#f0f8ff">
                                        <div style="padding:20px; text-align:left" class="row" float="left">
                                            name :
                                        </div>
                                        <div style="padding:20px" class="row">
                                            <input  type="text" name="name" id="name" value="{{!empty($choice)? $choice->name:null}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4"   bgcolor="#f0f8ff">
                                        <div style="padding:20px; text-align:left" class="col-md-4">
                                            <input  type="submit" value=" apply " name="submit" id="submit">
                                        </form>
                                        @if (!empty($choice))
                                        <form action="{{ route('choices.destroy', $choice->id)}}" method="POST">
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
            </div>
    </div>
@endsection
