<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;

class IsField {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (session('theuser') === 'admin' || session('theuser') === 'client' || session('theuser') === 'program' || session('theuser') === 'field')
		{
			return $next($request);
		}
		return new RedirectResponse(url('/'));
	}

}