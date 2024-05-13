<?php

namespace App\Services;

use App\Models\SettingApp;
use Xendit\Invoice;
use Xendit\Xendit;

class XenditService
{

    public function __construct()
    {
        $setingApp = SettingApp::first();

        Xendit::setApiKey($setingApp->xendit_secret_key);
    }

    public function createInvoice($xenditParram): array
    {
        return Invoice::create($xenditParram);
    }

    public function getAllPaymentMethods()
    {
        return ["QRIS",  "OVO", "DANA", "SHOPEEPAY", "LINKAJA", "ALFAMART", "BNI", "BSI", "BRI", "MANDIRI", "PERMATA"];
    }

    public function getAllPaymentMethodsExceptAlfamartAndBankVA()
    {
        return ["QRIS",  "OVO", "DANA", "SHOPEEPAY", "LINKAJA"];
    }
}
