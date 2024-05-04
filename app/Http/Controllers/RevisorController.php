<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view ('revisor.index', compact('announcement_to_check'));
    }


    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with("message", "hai accettato l'annuncio,bravo");
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with("message", "hai rifiutato l'annuncio,bravo");
    }

    //bottone in email admin per far diventare qualcuno revisore
    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor',["email"=>$user->email]);
        return redirect('/')->with('message',"Complimenti,l'utente è diventato revisore");
    }


    // public function becomeRevisor(Request $request){
    //     Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
    //     return redirect('/')->with('message',"Grazie per esserti candidato! La tua richiesta é in fase di elaborazione.");
    // }

    public function revisorForm(){
        return view('revisor.form');
    }

    public function becomeRevisor(Request $request){
        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->description = $request->description;

        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user(), $request->description));

        return redirect()->back()->with('message',"Grazie per esserti candidato! La tua richiesta é in fase di elaborazione.");
    }
}


