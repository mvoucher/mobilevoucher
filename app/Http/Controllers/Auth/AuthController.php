<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;

use App\Jobs\SendMail;

use App\Models\Invite;

class AuthController extends Controller
{

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	
	protected $role_gestion;

	public function __construct(
		RoleRepository $role_gestion)
	{
		$this->role_gestion = $role_gestion;
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	
	public function postLogin(
		LoginRequest $request,
		Guard $auth)
	{
		$logValue = $request->input('log');

		$logAccess = filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $throttles = in_array(
            ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
			return redirect('/auth/login')
				->with('error', trans('front/login.maxattempt'))
				->withInput($request->only('log'));
        }

		$credentials = [
			$logAccess  => $logValue, 
			'password'  => $request->input('password')
		];

		if(!$auth->validate($credentials)) {
			if ($throttles) {
	            $this->incrementLoginAttempts($request);
	        }

			return redirect('/auth/login')
				->with('error', trans('front/login.credentials'))
				->withInput($request->only('log'));
		}
			
		$user = $auth->getLastAttempted();

		if($user->confirmed) {
			if ($throttles) {
                $this->clearLoginAttempts($request);
            }

			$auth->login($user, $request->has('memory'));

			if($request->session()->has('user_id'))	{
				$request->session()->forget('user_id');
			}

			//Dashboards


			if(session('theuser') == 'admin'){
				return redirect('admin');	
			}
			elseif(session('theuser') == 'client'){
				return redirect('client');	
			}			
			elseif(session('theuser') == 'program'){
				return redirect('program');	
			}else{
				return redirect('/');
			}

			
		}
		
		$request->session()->put('user_id', $user->id);	

		return redirect('/auth/login')->with('error', 'You must verify your email before you can access the site. ' .
                '<br>If you have not received the confirmation email check your spam folder.'.
                '<br>To get a new confirmation email please <a href="' . url('auth/resend') . '" class="alert-link">click here</a>.');			
	}


	public function postRegister(
		RegisterRequest $request,
		UserRepository $user_gestion)
	{

		if ($request->hasFile('photo')){
			$file = $request->file('photo');
    		$imageTempName = $request->file('photo')->getPathname();
    		$imageName = $request->file('photo')->getClientOriginalName();
    		$path = base_path() . '/public/profile_photos/';
    		$request->file('photo')->move($path , $imageName);        
	}else{
	$imageName = "default.png";
}

			$user = $user_gestion->store(
			$request->all(), 
			$confirmation_code = str_random(30),
			$imageName
		);

		$this->dispatch(new SendMail($user));

		return redirect('/')->with('ok', 'Thanks for signing up! Please check your email.');
	}

	
	public function getConfirm(
		UserRepository $user_gestion,
		$confirmation_code)
	{
		$user = $user_gestion->confirm($confirmation_code);

        return redirect('/')->with('ok', 'You have successfully verified your account! You can now login.');
	}

	
	public function getResend(
		UserRepository $user_gestion,
		Request $request)
	{
		if($request->session()->has('user_id'))	{
			$user = $user_gestion->getById($request->session()->get('user_id'));

			$this->dispatch(new SendMail($user));

			return redirect('/')->with('ok', 'A confirmation message has been sent. Please check your email.');
		}
		return redirect('/');        
	}

public function getRegister($id,$registration_code)
    {

    	$invites = new Invite;
    	$invite = $invites->where('user_id', '=', $id)
            ->where('registration_code', '=', $registration_code)
            ->first();

        if (!$invite) {
    		return redirect('/');
        }else{

		//get last registered id
		$invites->where('registration_code','=',$registration_code)->update(array('response' => 1,'registration_code'=>null));
	   
	   return view('auth.register',array_merge(compact('invite'),$this->role_gestion->getOrgRoles(),$this->role_gestion->getProgRoles()));  
	         	
        }
    }
	
}
