<?php
/*--- by @BlIJJ -----
المطور : @BlIJJ
قناتنا : @M_M_D74

لا تنسونا بصالح الدعاء ❤️
----- by @BlIJJ  -----*/
$houda = explode("/",$_SERVER['PATH_INFO']);

$send = $_REQUEST;
$token = str_replace('bot','',$houda[1]);
$method = $houda[2];
define('API_KEY',$token);
if($token!==null and $method !==null and $send !==null ){
function bot($method,$datas=[]){
 $url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
 curl_setopt($ch,CURLOPT_URL,$url);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
 curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
 $res = curl_exec($ch);
 if(curl_error($ch)){
 var_dump(curl_error($ch));
 }else{
 return print_r($res);
 }
}
bot($method,$send);
}else{
$array =[
'ok'=>'false',
'error_code'=>404,
'BY'=>'@BlIJJ'
];
print_r(json_encode($array));
}
/*--- by @BlIJJ -----

المطور : $BlIJJ

قناتنا : @M_M_D74

- الاستخدام : 

- ارفع الملف باي استضافه ولو مجانيه اهم شي تكون ما حظرت البوتات 

- حط رابط الملف بمكان اي فانكشن اتصال راح يشتغل بدون مشاكل 

لا تنسونا بصالح الدعاء ❤️
----- by @BlIJJ  -----*/
?>
