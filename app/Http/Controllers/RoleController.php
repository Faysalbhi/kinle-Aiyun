<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.role.index',[
            'roles'=>Role::latest()->paginate('10'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RoleRequest $request)
    {
        Role::create($request->validated());
        return redirect()->route('role');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
