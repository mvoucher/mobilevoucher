<?php

namespace App\Http\Controllers;

use App\Jobs\ChangeLocale;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

	public function language( $lang,
		ChangeLocale $changeLocale)
	{		
		$lang = in_array($lang, config('app.languages')) ? $lang : config('app.fallback_locale');
		$changeLocale->lang = $lang;
		$this->dispatch($changeLocale);

		return redirect()->back();
	}

}
