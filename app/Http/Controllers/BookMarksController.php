<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookMarksController extends Controller
{
    public function store(Request $request){
        $request->merge(['user_id' => auth()->id()]);
        $bookmark = Bookmark::create($request->all());

        return redirect()->back()->with('bookmarked','BookMarked Successfully!');
    }
}
