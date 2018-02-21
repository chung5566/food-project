<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use App\Mail;
use App\Cms_logo;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
    
    $me =Auth::user();
    if($me){
    $mails=Mail::where('reciever','=',$me->id)->orderBy('created_at', 'desc')->take(10)->get();
    $checked=Mail::where('reciever','=',$me->id)->where('checked','=','0')->take(10)->get();
    view()->share('mails', $mails);
    view()->share('checked',$checked);
    }
    }
}
