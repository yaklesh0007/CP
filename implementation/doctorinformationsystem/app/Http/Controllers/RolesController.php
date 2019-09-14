<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::latest()->paginate(5);
        return view('roles.index',compact('roles'))
        ->with('i',(request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $role=Role::create([
            'name'=>$request->input('name')
        ]);
        if($role)
        {
            return redirect()->route('roles.index',)
            ->with('status' , 'role created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role = Role::find($role->id);

        return view('roles.show', ['role'=>$role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role = Role::find($role->id);
        
        return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $roleUpdate = Role::where('id', $role->id)
                                ->update([
                                        'name'=> $request->input('name')
                                        
                                ]);

      if($roleUpdate){
          return redirect()->route('roles.index')
          ->with('status' , 'role updated successfully');
      }
      //redirect
      return back()->with('status','!!oops something went wrong ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $findRole = Role::find( $role->id);
		if($findRole->delete()){
            
            //redirect
            return redirect()->route('roles.index')
            ->with('status' , 'role deleted successfully');
        }

        return back()->withInput()->with('status' , 'Role could not be deleted');
    }
}
