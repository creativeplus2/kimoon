<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\DB;


function format_rupiah($angka)
{
    $rupiah = number_format($angka, 0, ',', '.');
    return 'Rp ' . $rupiah;
}

function totalMemberByType($type)
{
    $data = Member::where('type_user', $type)
        ->get();
    return $data->count();
}
function getDate2($date)
{
    $day = Carbon::parse($date)->format('d');
    return $day;

}
function getMonth2($date)
{
    $day = Carbon::parse($date)->format('M');
    return $day;

}
function getYear2($date)
{
    $day = Carbon::parse($date)->format('Y');
    return $day;

}
function totalMemberByStatus($status)
{
    $data = Member::where('status_member', $status)
        ->get();
    return $data->count();
}

function getParent($id)
{
    if ($id != null || $id != '') {
        $data = DB::table('members')
            ->where('id', $id)
            ->first();
        return $data->nama_member;
    } else {
        return "-";
    }
}
