<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdsController
{
    public function index(){

        $ads =  Ads::orderBy('created_at', 'desc')->paginate(5);


        return view('ads.index', compact('ads'));
    }

    public function create()
    {
        return view('ads.create');
    }

    public function store(Request $request, Ads $ads)
    {
        $request->validate([
            'name' => ['required'],
            'body' => ['required'],
        ]);

        $data = $request->all();

        $ads = new Ads();
        $ads->name = $data['name'];
        $ads->body = $data['body'];
        $ads->user_id = Auth::user()->id;
        $ads->save();

        return redirect()->route('ads.index');
    }

    public function show($id)
    {
    }

    public function edit(Ads $ads)
    {
        return view('ads.update', compact('ads'));
    }

    public function update(Request $request, Ads $ads)
    {
        $request->validate([

            'name' => ['required'],
            'body' => ['required', Rule::unique('ads')->ignore($ads->id)],
        ]);

        $ads->update($request->all());

        return redirect()->route('ads.index');

    }

    public function destroy(Ads $ads)
    {
        $ads->delete();

        return redirect()->route('ads.index');
    }
}
