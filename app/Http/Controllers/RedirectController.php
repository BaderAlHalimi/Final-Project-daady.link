<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    //
    public function show(Request $request, $card)
    {
        $domain = request()->getHost();
        $domain1 = request()->getHost() . ':' . request()->getPort();
        $card = Card::where('url', $card)->latest()->first();
        if ($card) {
            $card->update(['clicks' => $card->clicks + 1]);
            if ($domain == $card->domain || $domain1 == $card->domain) {
                return view('redirect', compact('card'));
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }
}
