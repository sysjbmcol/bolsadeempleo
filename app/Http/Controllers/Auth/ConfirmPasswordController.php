<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Traits\RedirectsUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConfirmPasswordController extends Controller
{
    use RedirectsUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showConfirmForm()
    {
        return view('auth.passwords.confirm');
    }

    public function confirm(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $this->resetPasswordConfirmationTimeout($request);

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }

    protected function resetPasswordConfirmationTimeout(Request $request)
    {
        $request->session()->put('auth.password_confirmed_at', time());
    }

    protected function rules()
    {
        return [
            'password' => 'required|current_password:web',
        ];
    }

    protected function validationErrorMessages()
    {
        return [];
    }
}
