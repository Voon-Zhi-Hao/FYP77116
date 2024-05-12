<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $role=Auth::user()->role;

        if($role=='1')
        {
            return view('supervisor');
        }

        else
        {
            $supervisorsSE = User::where('role', '1')
                    ->where('programme', 'software-engineering')
                    ->get();

            $supervisorsCS = User::where('role', '1')
            ->where('programme', 'computational-science')
            ->get();
            $supervisorsIS = User::where('role', '1')
            ->where('programme', 'information-system')
            ->get();
            $supervisorsMC = User::where('role', '1')
            ->where('programme', 'multimedia-computing')
            ->get();
            $supervisorsNC = User::where('role', '1')
            ->where('programme', 'network-computing')
            ->get();

            return view('dashboard', compact('supervisorsSE','supervisorsCS','supervisorsIS','supervisorsMC','supervisorsNC'));
        }


    }
}
