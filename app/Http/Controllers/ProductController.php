<?php

namespace App\Http\Controllers;

use App\Jobs\SendNotificationEmailJob;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create() {
        return view('product.addProduct');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','min:2'],
            'quantidade' => ['required','string'],
            'valor' => ['required','string'],
        ]);
        
        if (!isset($request)) {
            return redirect()->route('product.create');
        }
        
        $product = Product::factory()->createOne([
            'name' => $request->name,
            'quantidade' => $request->quantidade,
            'valor' => $request->valor,
        ]);

        $users = User::all();

        SendNotificationEmailJob::dispatch($users, $product);

        return redirect()->route('product.store');
    }
}
