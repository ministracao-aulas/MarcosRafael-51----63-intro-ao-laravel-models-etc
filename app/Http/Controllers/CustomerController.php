<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Mail\CustomerWelcome;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * function create
     *
     * @param Request $request
     * @return View
     */
    public function create(Request $request): View
    {
        return \view('customer.create');
    }

    /**
     * function store
     *
     * @param Request $request
     * @return View
     */
    public function store(Request $request): View
    {
        $request->validate([
            'nome' => 'required|string|min:3',
            'email' => 'required|email|min:3',
        ]);

        $nome = $request->input('nome');
        $email = $request->input('email');

        $customer = Customer::factory()->createOne([
            'name' => $nome,
        ]);

        Mail::to($email)->send(new CustomerWelcome($customer));

        return \view('customer.created', [
            'nome' => $nome,
        ]);
    }
}
