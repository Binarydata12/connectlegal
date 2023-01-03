<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use App\Models\Lawyer;
use App\Models\Post;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function community() {
        $user = auth()->user();
        $isLawyer = Lawyer::where([
            'user_id' => $user->id,
            'is_verified' => 1
        ])->first();

        if(!$isLawyer) {
            return redirect()->route('unauthenticated');
        }
        $posts = Post::whereNull('group_id')
        ->orderBy('created_at', 'DESC')
        ->get();
        $lawyers = Lawyer::where([
            ['user_id', '!=', $user->id],
            ['is_verified', 1]
        ])->get();

        // return view('lawyer.community.community', compact('posts', 'lawyers'));
        return view('lawyer.pages.community.feed', compact('posts', 'lawyers'));
    }

    public function allLawyers() {
        $lawyers = Lawyer::where([
            ['is_verified', 1],
            ['user_id', '!=', auth()->user()->id]
        ])->get();
        // return view('lawyer.community.all-lawyers', compact('lawyers'));
        return view('lawyer.pages.community.all-lawyers', compact('lawyers'));
    }

}
