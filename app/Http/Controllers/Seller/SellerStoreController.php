<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerStoreController extends Controller
{
    public function index(){
        $stores = Store::where('user_id', Auth::id())->get();
        return view('seller.store.index', compact('stores'));
    }
    public function create(){
        return view('seller.store.create');
    }

    public function Store(Request $request){
        $request->validate([
            'name' => 'required|string|unique:stores|max:100',
            'slug' => 'required|string|max:50',
            'details' => 'nullable|string',
        ]);
        Store::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'details' => $request->details,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('vendor.store.index')->with('message', 'Store created successfully.');
    }

    public function edit($id){
        $store = Store::findOrFail($id);
        return view('seller.store.edit', compact('store'));
    }

    public function update(Request $request, $id){
        $store = Store::findOrFail($id);
        $request->validate([
            'name' => 'required|string|unique:stores,name,'.$store->id.'|max:100',
            'slug' => 'required|string|max:50',
            'details' => 'nullable|string',
        ]);
        $store->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'details' => $request->details,
        ]);
        return redirect()->route('vendor.store.index')->with('message', 'Store updated successfully.');
    }

    public function destroy($id){
        $store = Store::findOrFail($id);
        $store->delete();
        return redirect()->route('vendor.store.index')->with('message', 'Store deleted successfully.');
    }

}
