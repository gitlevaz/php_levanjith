<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Requestr;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Validator;
use DB;
use DataTables;
use Carbon\Carbon;
use App\User;
use App\sales_representative;
use App\route;

class TaskController extends Controller
{
    //view home
    public function home()
    {
        $types = route::get();
        return view('home', compact('types'));
    }
    
    //view table
    public function table()
    {
        $types = sales_representative::get();
        return view('table', compact('types'));
    }

    //create sales_representative
    public function laradd_available(Request $request)
    {
        sales_representative::create($request->all());
    }


    // add data
    public function addAvailable(Request $request)
    {
        sales_representative::create($request->all());
        return redirect()->back()->with('alert', 'Data Successfully Updated!');;
    }

    // add route
    public function addRoute(Request $request)
    {
        route::create($request->all());
        return redirect()->back()->with('alert', 'Data Successfully Updated!');;
    }

    //get to tabale
    public function getclients(Request $request)
    {
        $rr = sales_representative::get();

        return Datatables::of($rr)
            ->addColumn('action', function ($row) {

                $model = '<button class="btn btn-primary btn-edit" data-toggle="modal" data-target="#addAvailableModal" data-id="' . $row->id . '">Edit</button>';
                $Delete = '<button class="btn btn-danger btn-delete" data-id="' . $row->id . '">Delete</button>';
                return $model . ' ' . $Delete;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    //edit
    public function getclientid($id)
    {
        $rtr = sales_representative::where('id', $id)->first();
        return $rtr;
    }

    //update
    public function changeclient(Request $request)
    {
        $rr = sales_representative::where('id', $request->input('id'))->first();

        $rr->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'tele_no' => $request->input('tele_no'),
            'route' => $request->input('route'),
            'join_date' => $request->input('join_date'),
            'comments' => $request->input('comments')
        ]);

        return response()->json(['msg' => 'You successfully Updated']);
    }

    //delete
    public function clientdel($id)
    {
        sales_representative::where('id', $id)->delete();
        return response()->json(['msg' => 'You successfully Delete']);
    }
}
