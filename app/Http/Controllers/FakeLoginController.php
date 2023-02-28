<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class FakeLoginController extends Controller
{
    /**
     * function form
     *
     * @param Request $request
     * @return View
     */
    public function form(Request $request): View
    {
        return view('auth.login');
    }

    /**
     * function handleForm
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function handleForm(Request $request): RedirectResponse
    {
        \sleep(1); // DB

        $horaAntes = date('H-i-s');
        $this->enviaEmailParaOUsuario($request);

        // $request->session()->flash('hora_antes', $horaAntes);

        return redirect()->route('profile')->with('hora_antes', $horaAntes);
    }

    /**
     * function enviaEmailParaOUsuario
     *
     * @param Request $request
     * @return void
     */
    public function enviaEmailParaOUsuario(Request $request): void
    {
        $vip = [
            'vip@mail.com',
        ];

        $isVip = \in_array($request->input('email'), $vip, true);
        $queueName = $isVip ? 'vip-queue' : 'default';

        // E-mail de notificação
        \App\Jobs\NotificaLogin::dispatch([
            'line' => __FILE__ . ':' . __LINE__,
            'time' => date('Y-m-d H:i:s'),
            'email' => $request->input('email'),
        ])->onQueue($queueName);
    }

    /**
     * function profileHome
     *
     * @param Request $request
     * @return View
     */
    public function profileHome(Request $request): View
    {
        return view('auth.profile');
    }
}
