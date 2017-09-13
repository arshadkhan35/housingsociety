<?php

namespace App\Http\Middleware;

use Closure;

class userRole
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
         $userid = Auth::user()->id;
         $rid = roles::where('user_id','=',$userid)->pluck('rid');
         if($rid[0] != 1){
            return redirect('/home');
         }
        return $next($request);
    }
}
