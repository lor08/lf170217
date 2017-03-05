<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
use Redirect;
use Sentinel;
use Activation;
use Reminder;
use Validator;
use Mail;
use Storage;
use CurlHttp;
use Config;

class AuthController extends Controller
{
    /**
     * Show login page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('front.auth.login');
    }

    /**
     * Show wait page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function wait()
    {
        return view('auth.wait');
    }

    /**
     * Process login users
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function loginProcess(Request $request)
    {
        $errors = array();
        try {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $remember = (bool)$request->remember;
            if (Sentinel::authenticate($request->all(), $remember)) {
//                return Redirect::intended('/');
            }else{
                $errors[] = 'Неправильный логин или пароль.';
            }
//            return Redirect::back()
//                ->withInput()
//                ->withErrors($errors);
        } catch (NotActivatedException $e) {
            $sentuser = $e->getUser();
            $activation = Activation::create($sentuser);
            $code = $activation->code;
            $sent = Mail::send('mail.account_activate', compact('sentuser', 'code'), function ($m) use ($sentuser) {
                $m->from('noreplay@mysite.ru', 'LaravelSite');
                $m->to($sentuser->email)->subject('Активация аккаунта');
            });

            if ($sent === 0) {
                $errors[] = "Ошибка отправки письма активации.";
//                return Redirect::to('login')
//                    ->withErrors('Ошибка отправки письма активации.');
            }
            $errors[] = 'Ваш аккаунт не ативирован! Поищите в своем почтовом ящике письмо со ссылкой для активации (Вам отправлено повторное письмо). ';
//            return view('auth.login')->withErrors($errors);
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $errors[] = "Ваш ip блокирован на {$delay} секунд.";
        }
        return Redirect::intended( '/' . Config::get('sleeping_owl.url_prefix') );
//        return Redirect::back()
//            ->withInput()
//            ->withErrors($errors);
    }

    /**
     * @return mixed
     */
    public function logoutuser()
    {
        Sentinel::logout();
        return Redirect::intended('/');
    }

}