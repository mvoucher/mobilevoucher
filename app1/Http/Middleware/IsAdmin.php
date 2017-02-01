<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;

class IsAdmin {

	
	public function handle($request, Closure $next)
	{
		if (session('theuser') === 'admin')
		{
			return $next($request);
		}
		return new RedirectResponse(url('/'));
	}

}
