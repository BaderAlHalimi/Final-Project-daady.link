<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminCardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards =  Card::with('user');
        if(request('search')){
            $cards->where('title','LIKE',"%".request('search')."%")
                ->orWhere('description','LIKE',"%".request('search')."%")
                ->orWhere('redirect_url','LIKE',"%".request('search')."%");
        }
        if (request('order') == 'most-clicks') {
            $cards->orderBy('clicks', 'DESC');
        } else {
            $cards->latest();
        }
        $cards = $cards->paginate(20);
        // dd($cards);
        $is_archive = false;

        return view('admin.dashboard', compact('cards', 'is_archive'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'domain' => ['required'],
            'image' => ['nullable'],
        ]);
        $card = Card::where('id', $request->id)->first();
        if ($card && $request->hasFile('image')) {
            $file = $request->image;
            $path = $file->store('/' . $card->domain . '/images', 'public');
            $request->merge([
                'image_path' => $path,
            ]);
        }
        if ($card) {
            $card->update($request->all());
        } else {
            abort(404);
        }
        return redirect()->route('admin.dashboard');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
        $card->delete();
        return redirect()->route('admin.dashboard');
    }
    public function archive()
    {
        $cards = Card::onlyTrashed()->where('user_id', Auth::id());
        if (request('order') == 'most-clicks') {
            $cards->orderBy('clicks', 'DESC');
        } else {
            $cards->orderBy('deleted_at','DESC');
        }
        $cards = $cards->paginate(20);
        // dd($cards);
        $is_archive = true;
        return view('admin.dashboard', compact('cards', 'is_archive'));
    }
    
}
