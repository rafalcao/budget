<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

use App\Mail\VerifyRegistration;
use App\Currency;
use App\User;
use App\Space;
use App\Tag;
use Hash;
use Mail;

class RegisterController extends Controller
{
    /** @var string  */
    const ROLE = 'admin';

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $currencies = Currency::all();

        return view('register', compact('currencies'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'currency' => 'required|exists:currencies,id'
        ]);

        $user     = $this->createUser($request);
        $space    = $this->createSpace($request->name);

        $user->spaces()->attach(
            $space->id,
            ['role' => self::ROLE]
        );

        $this->createDefaultTags($space->id);

        $this->sendMail($user);

        return redirect()
            ->route('login')
            ->with([
                'alert_type' => 'success',
                'alert_message' => __('messages.login_success')
            ]);
    }

    /**
     * @param $request
     * @return User
     */
    protected function createUser($request)
    {
        // User
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->verification_token = str_random(100);
        $user->currency_id = $request->currency;
        $user->language = 'pt';

        $user->save();

        return $user;
    }

    /**
     * @param $name
     * @return Space
     */
    protected function createSpace($name)
    {
        // Space
        $space = new Space;
        $space->name = "Espaço do " . $name;
        $space->save();

        return $space;
    }

    /**
     * @param $user
     * @return mixed
     */
    protected function sendMail($user)
    {
        return Mail::to($user->email)->queue(new VerifyRegistration($user));
    }

    /**
     * @param $spaceId
     * @return mixed
     */
    protected function createDefaultTags($spaceId)
    {
        return Tag::createDefault($spaceId);
    }
}
