<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Closure;

class AcceptanceDoc
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
        $doc_acceptance = DB::table('acceptance_doc')->where('id_doc', $request->id)->get();
        $flag = 0;
        //dd($doc_evalute);
       if($doc_acceptance!=null){

        foreach ($doc_acceptance as  $doc)
        {
            // dd($doc_discuss[$key]->id_user_discuss);
            if(Auth::check() && Auth::user()->id == $doc->id_user_acceptance)
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
        return redirect()->route('loginacceptance');

    }
    else{
       return abort(404, 'Trang không tồn tại');
    }
    }
}
