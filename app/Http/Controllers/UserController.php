<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;

class UserController extends Controller
{
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
  public function create()
  {
    $userslist = User::withTrashed()->get();
    $roles = User::getRoles();
    return view('EditarUsuarios', compact('userslist', 'roles'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
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
    $roles = User::getRoles();
    $user = User::findOrFail($id);
    return view('/editarPerfil', compact('user','roles'));
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
    // var_dump($request);

    $this->validate($request, [
      'name' => 'required',
      'email' => 'required',
    ]);
    $user = Auth::user();
    $user->name = request('name');
    $user->email = request('email');
    $user->save();

    return back();
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $user = User::findOrFail($id);

    if (!$user->isAdmin()) {
      $user->delete();
    }

    return redirect("/editarUsuarios");
  }

  public function restore($id) {
    User::withTrashed()->find($id)->restore();
    return redirect("/editarUsuarios");
  }

}
