<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalog;
use App\User;
use \Auth;
use App\Wish;

class CatalogController extends Controller
{
    public function __construct(){
      $this->middleware('shield', ['only' => ['show', 'edit', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $catalogs = Catalog::where('user_id', Auth::id())->get();
      return view('catalogs.index',['catalogs' => $catalogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = User::where('id', $request->id)->first();
      Catalog::create(['user_id' => $user->id, 'login' => $user->name, 'name' => $request->name]);
      return redirect('/catalogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wishes = Wish::where('catalog_id', $id)->get();
        return view('catalogs.wishes.index', ['wishes' => $wishes, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalog = Catalog::where('_id', $id)->first();
        return view('catalogs.edit', ['catalog' => $catalog]);
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
        $catalog = Catalog::where('_id', $id)->first();
        $catalog->name = $request->name;
        $catalog->save();
        return redirect('/catalogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Catalog::destroy($id);
        Wish::where('catalog_id', $id)->delete();
        return redirect('/catalogs');
    }
}
