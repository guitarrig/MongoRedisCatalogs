<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalog;
use App\Wish;
use App\User;

class WishController extends Controller
{

    public function __construct(){
      $this->middleware('shield', ['only' => ['edit', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      return view('catalogs.wishes.create', ['id' => $request->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Wish::create(['name' => $request->name, 'description' => $request->description, 'catalog_id' => $request->id]);

        return redirect('/catalogs'. '/' . $request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $wish = Wish::where('_id', $id)->first();
      return view('catalogs.wishes.edit', ['wish' => $wish]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $wish = Wish::where('_id', $id)->first();
      $wish->name = $request->name;
      $wish->description = $request->description;
      $wish->save();
      return redirect('/catalogs'.'/'.$wish->catalog_id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Wish::where('_id', $id)->delete();
        return \Redirect::back();
    }
}
