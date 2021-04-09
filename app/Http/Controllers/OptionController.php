<?php

namespace App\Http\Controllers;

use App\Http\Resources\OptionResourceCollection;
use App\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data= Option::with('choices')->paginate(15);
        $response =new OptionResourceCollection($data);
        return $request->wantsJson()
            ?  $response
            :view("option.index")->withOptions($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //TODO admin authrize
        return view("option.create_edit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO admin authrize
        $data = $request->only('name');
        $option= Option::create($data);
        return $request->wantsJson()
        ?  $option
        :redirect("/api/options");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        //TODO admin authrize
        return view("option.create_edit")
        ->withOption($option);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Option $option)
    {
        $data = $request->only('name');
        $option->update($data);//TODO add chioces
        return $request->wantsJson()
            ?  $option
            :redirect("/api/options");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option,Request $request)
    {
        $option->delete();
        return $request->wantsJson()
            ?  response(null,204)
            :redirect("/api/options");//TODO delete chioces
    }
}
