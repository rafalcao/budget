<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CreditCards;
use Auth;
use DB;

class CreditCardsController extends Controller
{
    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function index()
    {
        return view('credit_cards.index', [
            'creditCards' => session('space')->creditCards()->orderBy('created_at', 'ASC')->get()
        ]);
    }

    /**
     * @param CreditCards $creditCards
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(CreditCards $creditCard)
    {
        $this->authorize('edit', $creditCard);

        return view('credit_cards.edit', compact('creditCard'));
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function create() {
        return view('credit_cards.create', [
            'tags' => session('space')->tags
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'due_day' => 'required|integer|between:1,28'
        ]);

        if(!empty(session('space'))){
            $space = (array) session('space');
        }

        try {
            $creditCard = new CreditCards();
            $creditCard->space_id = $space['id'];
            $creditCard->name = $request->input('name');
            $creditCard->due_day = $request->input('due_day');
            $creditCard->status = 1;
            $creditCard->save();
        } catch (Exception $e) {

        }

        return redirect()->route('credit_cards.index');
    }

    /**
     * @param Request $request
     * @param Earning $earning
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, CreditCards $creditCard)
    {
        $this->authorize('edit', $creditCard);

        $request->validate([
            'name' => 'required|max:255',
            'due_day' => 'required|integer|between:1,28',
            'status' => 'required|boolean'
        ]);

        $creditCard->fill([
            'name' => $request->input('name'),
            'due_day' => $request->input('due_day'),
            'status' => $request->input('status')
        ])->save();

        return redirect()->route('credit_cards.index');
    }
}
