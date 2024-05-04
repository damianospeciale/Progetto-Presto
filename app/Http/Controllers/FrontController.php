<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home () {

        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(6);
        

        return view('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category){
        $announcements = $category->announcements()->where('is_accepted', true)->get();
        return view('category.show', compact('category', 'announcements'));
    }

    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);

        return view ('announcement.index', compact('announcements'));
    }

    public function setlocale($lang){
        
        session()->put('local', $lang);
        return redirect()->back();
    }

}
