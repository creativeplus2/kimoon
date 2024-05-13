<?php

namespace App\Http\Controllers;

use App\Http\Requests\Xendit\GetPaymentLinkRequest;
use App\Models\Member;
use App\Services\TypeUserService;
use App\Services\XenditService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class XenditController extends Controller
{
    public function getPaymentLink(GetPaymentLinkRequest $request)
    {
        $typeUserService = new TypeUserService();
        $member = Member::where('kode_member', $request->c)->first();

        if ($member->status == 'Approved') {
            return abort(403);
        }

        $externalId = Str::uuid()->toString();

        $xenditParram = [
            'external_id' => $externalId,
            'payer_email' => $member->email,
            'description' => 'Aktivasi registrasi member ' . $member->type_user . ' dengan kode member ' . $member->kode_member,
            'amount' => intval($typeUserService->getRegistrationPriceByUserType($member->type_user)),
            'success_redirect_url' => url('/login-member?va_payment=approved'),
            'customer' => [
                'given_names' => $member->nama_member,
                'email' => $member->email,
                'mobile_number' => $member->no_telpon
            ],
            'customer_notification_preference' => [
                'invoice_created' => ['email', 'whatsapp'],
                'invoice_reminder' => ['email', 'whatsapp'],
                'invoice_paid' => ['email', 'whatsapp'],
            ],
            'payment_methods' => [$request->m]
        ];

        $xenditService = new XenditService();
        $invoice = $xenditService->createInvoice($xenditParram);

        return redirect()->away($invoice['invoice_url']);
    }
}
