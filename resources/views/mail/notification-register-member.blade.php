<div id=":cq" class="a3s aiL ">Dear {{ $member->nama_member }},
    <br><br>
    Terima kasih sudah memilih Kimoon sebagai mitra {{ $member->type_user }} Anda!

    <p>Untuk aktivasi akun member {{ $member->type_user }}, silahkan lakukan pembayaran untuk mengisi deposit saldo : </p>
    <h1>Rp {{ number_format($priceRegistration, 0, '.', '.') }}</h1>
    <p>ke nomor rekening di Bawah ini</p>

    <b>Transfer Manual</b>
    <ul>
        @foreach ($bankAccounts as $bankAccount)
            <li><b>{{ $bankAccount->bank->nama_bank }}</b>: {{ $bankAccount->account_number }} | <b>A\N {{ $bankAccount->account_number }}</b></li>
        @endforeach
    </ul>

    <b>Virtual Account</b>
    <ul>
        @foreach ($xenditVirtualAccounts as $xenditVirtualAccount)
            <li><a href="{{ url('/pay?c=' . $member->kode_member . '&m=' . $xenditVirtualAccount) }}" target="_blank">{{ $xenditVirtualAccount }}</a></li>
        @endforeach
    </ul>

    <div style="color:#ff0000">Note : Hubungi admin setelah melakukan transfer untuk aktifasi akun member.</div>
    <br>
    <br>
    <br>
    Regards,
    Admin Kimoon
</div>
