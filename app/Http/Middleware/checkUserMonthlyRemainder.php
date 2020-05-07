<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\HttpException;
use GrahamCampbell\Throttle\Facades\Throttle;


class checkUserMonthlyRemainder
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
        $user_id = $request->route()->parameter('id');
        $userMonthQuota = 'App\User'::find($user_id)->month_quota;
        $usedThisMonth = 'App\userMonthlyUsage'::where([
            ['user_id', '=', $user_id],
            ['year', '=', Date('Y')],
            ['month', '=', Date('m')]
        ])->first();
        $used = ($usedThisMonth) ? $usedThisMonth->used : 0;
        if($userMonthQuota > $used) {
            // New Usage
            $usage = 'App\userMonthlyUsage'::firstOrNew(['user_id' => $user_id, 'year' => Date('Y'), 'month' => Date('m')]);
            $usage->used = $usage->used+1;
            $usage->save();
            //
            return $next($request);
        }
        return response()->json(['message'=> 'Reached maximum month quota'], 403);
    }
}
