<p>Dear {{ $member->nama_member }},</p>
<p>Selamat pendaftaran member {{ $member->type_user }} anda berhasil !!!</p>
<p>Selamat bergabung di keluarga besar Kimoon.id</p>
<p>Silahkan melakukan penyetoran wallet pertama anda sebesar <br>
    IDR {{ number_format($price, 0, '.', '.') }} melalui :
</p>
<p>
    1.Transfer bank ke :<br />
    @foreach ($bankAccounts as $bankAccount)
    Nama Bank : {{ $bankAccount->bank->nama_bank }}<br />
    Nomor rekening : {{ $bankAccount->account_number }}<br />
    Nama rekening : {{ $bankAccount->account_name }}<br /><br />
    @endforeach

</p>
<p>
    2.Scan QR code untuk pembayaran (Apabila tidak muncul gunakan <a href="https://kimoon.id/images/qrkimoon.jpg">Link
        QR</a> ini atau cek di attachment):<br />
    <img width="400px" src="{{ $message->embed($imagePath) }}" alt="image">
</p>
<p>
    3.Hubungi admin untuk pembayaran dengan kartu kredit .
</p>
<p>
    Untuk konfirmasi pembayaran mohon lampirkan bukti pembayaran dengan mereplay email ini atau WA (+62 811 9151575) ke
    admin.
</p>
<hr>
@if ($member->type_user === 'Distributor')
<p>
    Berikut Term & Condition yang perlu anda ketahui sebagai distributor Kimoon.id:
<ol>
    <li>⁠Distributor area akan mengcover stok barang untuk area kabupaten yang sudah di pilih dan di setujui oleh kantor
        pusat.
    </li>
    <li>⁠Distributor akan segera mengirimkan order barang dari Subdis dan reseller di area nya.</li>
    <li>⁠Distributor akan menyetorkan wallet pertama dalam jangka waktu maksimal 7 hari dari pendaftaran.</li>
    <li>⁠Distributor akan mengorder setiap barang sejumlah minimum order untuk level distributor ( min 100 pcs per SKU
        ).</li>
    <li>⁠Repeat order setiap bulan untuk level distributor adalah senilai IDR {{ number_format($pricemonthly, 0, '.',
        '.') }} per bulan.</li>
    <li>Distributor akan melaporkan jumlah stok tersisa setiap minggu nya ke pihak admin kantor pusat.</li>
    <li>Distributor dilarang menjual harga barang ke end user di bawah yang sudah di tentukan.</li>
    <li>Distributor dapat merekrut reseller / subdis di area distribusinya, distributor akan mendapat notifikasi jika
        ada pendaftaran reseller / subdis di area nya dan akan segera melakukan follow up ke reseller/ subdis tsb.</li>
    <li>Distributor di persilahakan untuk membuat akun resmi official strore areanya di market place atau sosmed dengan
        menginformasikan ke pihak admin sebelumnya.</li>
</ol>
</p>
@else
<p>
    Berikut Term & Condition yang perlu anda ketahui sebagai {{ $member->type_user }} Kimoon.id:
<ol>
    <li>{{ $member->type_user }} akan menyetorkan wallet pertama dalam jangka waktu maksimal 7 hari dari pendaftaran.
    </li>
    <li>{{ $member->type_user }} akan mengorder setiap barang sejumlah minimum order untuk level {{ $member->type_user
        }}</li>
    <li>Repeat order setiap bulan untuk level {{ $member->type_user }} adalah senilai IDR {{
        number_format($pricemonthly, 0, '.', '.') }} per bulan.
    </li>
    <li>{{ $member->type_user }} akan mendapatkan akses kontak ke distributor / stokist area nya.</li>
    <li>{{ $member->type_user }} dilarang menjual harga barang ke end user di bawah yang sudah di tentukan.</li>
</ol>
</p>
@endif



<p>Terima kasih dan Selamat bergabung</p>

<p>Salam,
    <br /><br /><br />
    Manajemen<br />
    Kimoon.id<br />
    Empower Lives<br /><br />

    phone / whatsapp : +62 811 9151575<br />
    email: hello@kimoon.id<br />
    Virginia Arcade blok B2 no 1,<br />
    BSD, Tangerang Selatan Indonesia
</p>