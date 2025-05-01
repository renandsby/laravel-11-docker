<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $supports)
    {

        // $supports = new Support();
        $supports = $supports->all();
        return view('admin/supports/index', compact('supports'));
    }

    public function show(string|int $id)
    {
        // Support::find($id)
        //Support::where('id', $id)->first()
        //Support::where('id', '=' ,$id)->first()

        if(!$support = Support::find($id)){
            return back();
        }
        
        return view('admin/supports/show', compact('support'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function edit(Support $support,string|int $id)
    {
        if(!$support = $support->where('id', $id)->first()){
            return back();
        }
        
        return view('admin/supports.edit', compact('support'));
    }

    public function update(Request $request,Support $support, string $id)
    {
        if(!$support = $support->find($id)){
            return back();
        }
        $support->update($request->only([
            'subject', 'body'
        ]));
        return redirect()->route('supports.index');
    }

    public function destroy(Support $support, string|int $id)
    {
        if(!$support = $support->find($id)){
            return back();
        }
        $support->delete();
        return redirect()->route('supports.index');
    }

    public function store(Request $request, Support $support)
    {
        // dd($request->get(body));
        $data = $request->all();
        $data['status'] = 'a';

        // Support::create($data);
        $support = $support->create($data);
        return redirect()->route('supports.index');
    }
}
