<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VenuesController extends Controller
{

    public function index()
    {
        return view('admin.venues.index');
    }

    public function create()
    {
        return view('admin.venues.create');
    }

    public function store()
    {

    }

    public function edit($id)
    {
        return view('admin.venues.edit');
    }

    public function update(Request $request ,$id)
    {

    }

    public function destroy()
    {

    }

}
