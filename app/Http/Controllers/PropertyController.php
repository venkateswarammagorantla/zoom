<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $pro = Property::all();
    return view('indextemplate')->with('pros', $pro);
    }

    public function properties()
{

$pro = Property::all();
return view('properties')->with('pros', $pro);

}
public function pro_details($id)
{

$details = Property::where('id', '=', $id)->get();
return view('properties-single')->with('details', $details);

}
}