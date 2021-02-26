<?php

function check_already_login()
{
    $ci = &get_instance();

    $user_session = $ci->session->userdata('userid');

    if ($user_session) {
        redirect('dashboard');
    }
}

function check_not_login()
{
    $ci = &get_instance();

    $user_session = $ci->session->userdata('userid');

    if (!$user_session) {
        redirect('Auth/login');
    }
}

function check_admin()
{
    // intansiasi variabel
    $ci = &get_instance();

    // load library fungsi untuk mengambil data user yang login
    $ci->load->library('fungsi');

    // jika yang login level nya tidak sama dengan 1 maka arahkan ke halaman dashboard
    if ($ci->fungsi->user_login()->level != 1) {
        redirect('dashboard');
    }
}

function indo_currency($value)
{
    return 'Rp. ' . number_format($value, 0, ",", ".");
}

function indo_date($date)
{
    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);

    return $d . '-' . $m . '-' . $y;
}

function tgl($tgl)
{
    if ($tgl == '0000-00-00') {
        return "";
    } else {
        return date('Y-m-d', strtotime($tgl));
    }
}
