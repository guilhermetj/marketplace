<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    public function index()
    {
        $stores = \App\Store::paginate(10);

        return view('admin.stores.index', compact('stores'));
    }

    public function create()
    {
        $users = \App\User::all(['id','name']);

        return view('admin.stores.create', compact('users'));
    }

    public function store(StoreRequest $request)
    {
            $data = ($request->all());
            $user = auth()->user();
            
            $user->store()->create($data);

            return redirect()
            ->route('stores.index')
            ->with('message', 'Adicionado com sucesso');
    }
    public  function edit($store)
    {
        $store= \App\Store::find($store);

        return view('admin.stores.edit', compact('store'));
    }
    public  function update(StoreRequest $request, $store)
    {
        $data = $request->all();

        $store= \App\Store::find($store);
        $store->update($data);

        return redirect()
            ->route('stores.index')
            ->with('message', 'Editado com sucesso');
    }
    public  function destroy($store)
    {
        $store= \App\Store::find($store);
        $store->delete();
        return redirect()
            ->route('stores.index')
            ->with('message', 'Deletado com sucesso');
    }

}
