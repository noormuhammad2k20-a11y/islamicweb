<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ZakatConfig;

class ZakatController extends Controller
{
    public function index()
    {
        $config = ZakatConfig::first() ?? new ZakatConfig(['gold_price_per_gram' => 20000, 'silver_price_per_gram' => 250, 'currency_code' => 'PKR']);
        return view('pages.zakat.calculator', compact('config'));
    }

    public function country($country)
    {
        // Simple mock for specific country
        $config = ZakatConfig::first() ?? new ZakatConfig(['gold_price_per_gram' => 20000, 'silver_price_per_gram' => 250, 'currency_code' => strtoupper($country) == 'PAKISTAN' ? 'PKR' : 'USD']);
        return view('pages.zakat.calculator', compact('config', 'country'));
    }

    public function rules()
    {
        return view('pages.zakat.rules');
    }

    public function nisab()
    {
        return view('pages.zakat.nisab');
    }

    public function whoMustPay()
    {
        return view('pages.zakat.whomustpay');
    }

    public function whoCanReceive()
    {
        return view('pages.zakat.whocanreceive');
    }

    public function online()
    {
        return view('pages.placeholder', ['title' => 'online']);
    }
}
