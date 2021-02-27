<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DiscussTopic extends Model
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //  protected $topic_discuss = [
    //     'App\Model' => 'App\DiscussTopic',
    // ];
    public function handle($request, Closure $next)
    {
        $topic_discuss = DB::table('discuss_topic')->find($request->id);
       if($topic_discuss!=null){
       if(Auth::check() && Auth::user()->id == $topic_discuss->id_user_discuss)
        {
            return $next($request);
        }else{
            return redirect()->route('logindiscuss');
        }
    }else{
        return abort(404, 'Trang không tồn tại');
    }
    }
}
