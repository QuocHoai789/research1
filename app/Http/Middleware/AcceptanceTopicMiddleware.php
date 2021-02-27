<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Closure;

class AcceptanceTopicMiddleware
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
        $topic_acceptance = DB::table('acceptance_topic')->where('id_topic', $request->id)->get();
        $flag = 0;
        //dd($doc_evalute);
       if($topic_acceptance!=null){

        foreach ($topic_acceptance as  $topic) 
        {
            // dd($doc_discuss[$key]->id_user_discuss);    
            if(Auth::check() && Auth::user()->id == $topic->id_user_acceptance)
        {
            
           $flag = 1;
        }
 
        }
       
    }
    if($flag == 1){
        // echo 'có';
        
        return $next($request);
        
    }
    if($flag == 0)
    {
        // echo 'không';
        return redirect()->route('loginacceptancetopic');
        
    }
    else{
       return abort(404, 'Trang không tồn tại');
    }
    }
    
}
