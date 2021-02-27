<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DiscussDoc
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
        $doc_discuss = DB::table('discuss_doc')->where('id_doc', $request->id)->get();
        $flag = 0;
       if($doc_discuss!=null){

        foreach ($doc_discuss as $key =>  $doc)
        {
            // dd($doc_discuss[$key]->id_user_discuss);
            if(Auth::check() && Auth::user()->id == $doc_discuss[$key]->id_user_discuss)
        {
            // echo '123';
           $flag = 1;
        }

        }

    }
    if($flag == 1){

        return $next($request);

    }
    if($flag == 0)
    {

        return redirect()->route('logindoc');

    }
    else{
       return abort(404, 'Trang không tồn tại');
    }
    }
}
