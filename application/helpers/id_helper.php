<?php
function idkl()
{
    // $kon = mysqli_connect("", "root", "", "db_smsgateway");
    require "application/config/database.php";
    $host = $dbhelper['hostname2'];
    // var_dump($host);
    // var_dump($i);
    $username = $dbhelper['username2'];
    $password = $dbhelper['password2'];
    $database_name = $dbhelper['database2'];
    $kon = mysqli_connect($host, $username, $password, $database_name);
    $query  = "SELECT max(id_kelas) as maxID FROM tbl_kelas";
    $tampil = mysqli_query($kon, $query);
    $data   = mysqli_fetch_array($tampil);
    $idKL  = $data['maxID'];
    if ($data == null) {
        $newPG   = "KLS-01";
    } else {
        $noUrut  = (int) substr($idKL, 4, 3);
        $noUrut++;
    
        $char    = "KLS";
        $newPG   = $char . sprintf("-%02s", $noUrut);
    }
   

    return $newPG;
}

function idjr()
{
    // $kon = mysqli_connect("", "root", "", "db_smsgateway");
    require "application/config/database.php";
    $host = $dbhelper['hostname2'];
    // var_dump($host);
    // var_dump($i);
    $username = $dbhelper['username2'];
    $password = $dbhelper['password2'];
    $database_name = $dbhelper['database2'];
    $kon = mysqli_connect($host, $username, $password, $database_name);
    $query  = "SELECT max(id_jurusan) as maxID FROM tbl_jurusan";
    $tampil = mysqli_query($kon, $query);
    $data   = mysqli_fetch_array($tampil);
    $idKL  = $data['maxID'];
    if ($data == null) {
        $newPG   = "JRS-01";
    } else {
    $noUrut  = (int) substr($idKL, 4, 3);
    $noUrut++;

    $char    = "JRS";
    $newPG   = $char . sprintf("-%02s", $noUrut);
    }
    return $newPG;
}

function idrng()
{
    // $kon = mysqli_connect("", "root", "", "db_smsgateway");
    require "application/config/database.php";
    $host = $dbhelper['hostname2'];
    // var_dump($host);
    // var_dump($i);
    $username = $dbhelper['username2'];
    $password = $dbhelper['password2'];
    $database_name = $dbhelper['database2'];
    $kon = mysqli_connect($host, $username, $password, $database_name);
    $query  = "SELECT max(id_ruangan) as maxID FROM tbl_ruangan";
    $tampil = mysqli_query($kon, $query);
    $data   = mysqli_fetch_array($tampil);
    $idKL  = $data['maxID'];
    if ($data == null) {
        $newPG   = "RNG-01";
    } else {
    $noUrut  = (int) substr($idKL, 4, 3);
    $noUrut++;

    $char    = "RNG";
    $newPG   = $char . sprintf("-%02s", $noUrut);
    }
    return $newPG;
}





















?>