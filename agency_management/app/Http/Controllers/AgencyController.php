<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agency;
use Illuminate\Support\Facades\DB;

class AgencyController extends Controller
{
    public function index(){
        $agencies = Agency::all();
        return view('index',compact('agencies'));
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){
        $agency = new Agency();
        $agency->agency_id = $request->input('agency_id');
        $agency->name = $request->input('name');
        $agency->phone = $request->input('phone');
        $agency->email = $request->input('email');
        $agency->address = $request->input('address');
        $agency->manager = $request->input('manager');
        $agency->status = $request->input('status');
        $agency->save();
        return redirect()->route('list');
    }
    public function edit($id){
        $agency = Agency::findOrFail($id);
        return view('edit',compact('agency'));
    }
    public function update(Request $request, $id){
        $agency = Agency::findOrFail($id);
        $agency->name = $request->input('name');
        $agency->phone = $request->input('phone');
        $agency->email = $request->input('email');
        $agency->address = $request->input('address');
        $agency->manager = $request->input('manager');
        $agency->status = $request->input('status');
        $agency->save();
        return redirect()->route('list');
    }
    public function destroy($id){
        $agency = Agency::findOrFail($id);
        $agency->delete();
        return redirect()->route('list');
    }
    public function search(Request $request){
        $search = $request->input('search');
        $agencies = DB::table('agencies')->where('name','like','%'.$search.'%')->get();
        return view('index',compact('agencies'));
    }

}
