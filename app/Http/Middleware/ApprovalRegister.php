<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;
use Illuminate\Support\Facades\Auth;
class ApprovalRegister
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

       if(Auth::check())
        {
             $user = DB::table('register_topic')->where('id_user_approval', Auth::user()->id)->first();
             if(isset($user))
             {
                return $next($request);
             }
             else
             {
                return redirect('/login-approval');
             }
            
        }else{
            return redirect('/login-approval');
        }
    }
}
