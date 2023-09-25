<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd(request('order'));
        $cards = Card::where('user_id', Auth::id());
        if (request('order') == 'most-clicks') {
            $cards->orderBy('clicks', 'DESC');
        } else {
            $cards->latest();
        }
        $cards = $cards->paginate(20);
        // dd($cards);
        $is_archive = false;

        return view('dashboard', compact('cards', 'is_archive'));
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
        // dd($request->all());
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'redirect_url' => ['required'],
            'domain' => ['required'],
            'image' => ['required', 'image'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->image;
            $path = $file->store('/' . $request->domain . '/images', 'public');
            $request->merge([
                'image_path' => $path,
            ]);
        }
        do {
            $randomUrl = Str::random(6);
        } while (Card::where('url', $randomUrl)->exists());
        $request->merge([
            'user_id' => Auth::id(),
            'url' => $randomUrl,
        ]);
        Card::create($request->all());
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $card)
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
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
        try {
            DB::beginTransaction();
            $card->update(['status' => 'archived']);
            $card->delete();
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
        }
        return redirect()->back();
    }
    public function archive()
    {
        $cards = Card::onlyTrashed()->where('user_id', Auth::id());
        if (request('order') == 'most-clicks') {
            $cards->orderBy('clicks', 'DESC');
        }  else {
            $cards->orderBy('deleted_at','DESC');
        }
        $cards = $cards->paginate(20);
        // dd($cards);
        $is_archive = true;
        return view('dashboard', compact('cards', 'is_archive'));
    }
    public function duplicate(Request $request, $card)
    {
        $card = Card::where('id', $card)->withTrashed()->latest()->first();
        // dd($card);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $path = $file->store('/' . $request->domain . '/images', 'public');
            $request->merge([
                'image_path' => $path,
            ]);
        }
        do {
            $randomUrl = Str::random(6);
        } while (Card::where('url', $randomUrl)->exists());
        Card::create([
            'title' => $request->input('title',$card->title),
            'description' => $request->input('description',$card->description),
            'url' => $randomUrl,
            'redirect_url' => $request->input('redirect_url',$card->redirect_url),
            'domain' => $request->input('domain',$card->domain),
            'image_path' => $request->input('image_path',$card->image_path),
            'user_id' => Auth::id(),
        ]);
        return redirect()->back();
    }
    public function restore($card)
    {
        $card = Card::onlyTrashed()->where('id', $card)->restore();
        return redirect()->back();
    }
    public function editLink(Request $request, $card)
    {
        // قم بمعالجة البيانات هنا
        $card = Card::withTrashed()->where('id', $card)->latest()->first();
        $card->update(['redirect_url' => $request->input('newLink')]);
        // إذا تمت معالجة البيانات بنجاح، ارجع استجابة "OK"
        return response()->json(['message' => 'You need to refrish this page now'], 200);
    }
}
