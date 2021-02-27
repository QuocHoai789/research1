<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Closure;

class EvaluateDoc
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
        $doc_evalute = DB::table('evalute_doc')->where('id_doc', $request->id)->get();
        $flag = 0;
        //dd($doc_evalute);
       if($doc_evalute!=null){

        foreach ($doc_evalute as   $doc)
        {
            // dd($doc_discuss[$key]->id_user_discuss);
            if(Auth::check() && Auth::user()->id == $doc->id_user_evalute)
        {
           
           $flag = 1;
        }

        }

    }
    if($flag == 1){
        

        return $next($request);

    }
    if($flag == 0)
    {
        // echo 'không';
        return redirect()->route('loginevalute');

    }
    else{
       return abort(404, 'Trang không tồn tại');
    }
    }
}
