<?php

namespace App\Http\Controllers;

use App\Choice;
use App\Option;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('admin',Choice::class);
        return view("choice.create_edit")->withOption(
        Option::findOrFail(
            $request->option_id
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin',Choice::class);
        $data = $request->only('name','option_id');
        $choice= Choice::create($data);
        return $request->wantsJson()
        ?  $choice
        :redirect("/api/options");
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Choice  $choice
     * @return \Illuminate\Http\Response
     */
    public function edit(Choice $choice)
    {
        $this->authorize('admin',Choice::class);
        return view("choice.create_edit")
        ->withChoice($choice);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Choice  $choice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Choice $choice)
    {
        $this->authorize('admin',Choice::class);
        $data = $request->only('name');
        $choice->update($data);//TODO add chioces
        return $request->wantsJson()
            ?  $choice
            :redirect("/api/options");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Choice  $choice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Choice $choice,Request $request)
    {
        $this->authorize('admin',Choice::class);
        $choice->delete();
        return $request->wantsJson()
            ?  response(null,204)
            :redirect("/api/options");
    }
}
