<?php

namespace App\Http\Middleware;

use App\Exceptions\InvalidOwnerTeamException;
use Closure;
use Domain\Teams\Models\Team;
use Illuminate\Http\Request;

class CheckOwnerTeam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $request->team->isOwner(auth()->user())) {
            throw new InvalidOwnerTeamException();
        }

        return $next($request);
    }
}
