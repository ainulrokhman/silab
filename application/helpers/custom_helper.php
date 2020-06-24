<?php
defined('BASEPATH') or exit('No direct script access allowed');


function tampil_tgl($s)
{
    return date('d-m-Y', strtotime($s));
}

function insert_tgl($s)
{
    return date('Y-m-d', strtotime($s));
}
function ipost($s)
{
    $CI = &get_instance();
    return htmlspecialchars($CI->input->post($s, true));
}
function iget($s)
{
    $CI = &get_instance();
    return htmlspecialchars($CI->input->get($s, true));
}
