<?php
header('Content-Type: application/json; charset=utf-8');
$token="5593878913:AAGZPm4e9vhqJ5BPBZXQa1Kabl6h1m2mbys";// Your Token
define('API_KEY',$token);
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
        return json_decode($res);
    }
}
echo file_get_contents("https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);
$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
$message = $update->message;
$message_id = $update->message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$name1 = $message->from->last_name;
$from_id = $message->from->id;
$tc = $message->chat->type;
}
if(isset($update->callback_query)){
$data = $update->callback_query->data;
$chat_id = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$name = $update->callback_query->message->chat->first_name;
$user = $update->callback_query->message->chat->username;
$from_id = $chat_id;
$tc = $update->callback_query->message->chat->type;
}
mkdir("data");
$anime3rb = json_decode(file_get_contents("data/$from_id.json"),true);
function movie($k,$v=1){
$rr=[
"https://anime3rb.com/titles/list/tv/?page=$v/","https://anime3rb.com/titles/list/movie/?page=$v/","https://anime3rb.com/titles/list/ova/?page=$v/","https://anime3rb.com/titles/list/ona/?page=$v/","https://anime3rb.com/genre/comedy/?page=$v/","https://anime3rb.com/genre/action/?page=$v/","https://anime3rb.com/genre/fantasy/?page=$v/","https://anime3rb.com/genre/adventure/?page=$v/","https://anime3rb.com/genre/shounen/?page=$v/","https://anime3rb.com/genre/sci-fi/?page=$v/","https://anime3rb.com/genre/romance/?page=$v/","https://anime3rb.com/genre/school/?page=$v/","https://anime3rb.com/genre/supernatural/?page=$v/","https://anime3rb.com/genre/seinen/?page=$v/","https://anime3rb.com/genre/mystery/?page=$v/","https://anime3rb.com/genre/ecchi/?page=$v/","https://anime3rb.com/genre/slice-of-life/?page=$v/","https://anime3rb.com/genre/historical/?page=$v/","https://anime3rb.com/genre/mecha/?page=$v/","https://anime3rb.com/genre/super-power/?page=$v/"
];
return $rr[$k];
}
////
if($text == "/start"){
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>"https://t.me/LLYY5/76",
'caption'=>"
*اهلا بك $name في بوت Anime3rb استمتع بكل انواع افلام ومسلسلات الانمي 🎬 مجاني بدون اعلانات 🪧*
",'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
      'inline_keyboard'=>[
[['text'=>"• بـحـث 🔎 •",'callback_data'=>'search']],[['text'=>"• الاقسـام 🎬 •",'callback_data'=>'movies']],
[['text'=>"• المطور •",'url'=>'https://t.me/BlIJJ']],
]
])
]);
}
if($data == "back1"){
bot('editMessageMedia',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'media'=>json_encode([
'type'=>'photo',
'media'=>"https://t.me/LLYY5/76",
'caption'=>"
*اهلا بك $name في بوت Anime3rb استمتع بكل انواع افلام ومسلسلات الانمي 🎬 مجاني بدون اعلانات 🪧*
",'parse_mode'=>"Markdown",
]),
 'reply_markup'=>json_encode([
      'inline_keyboard'=>[
[['text'=>"• بـحـث 🔎 •",'callback_data'=>'search']],[['text'=>"• الاقسـام 🎬 •",'callback_data'=>'movies']],
[['text'=>"• المطور •",'url'=>'https://t.me/BlIJJ']],
]
])
]);
unlink("data/$from_id.json");
}
if ($data=="search"){
bot('editMessageCaption',[
'chat_id'=>$chat_id,
'message_id' =>$message_id,
'caption'=>"
*حسنا عزيزي ارسل الاسم الان :*
",'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
      'inline_keyboard'=>[
[['text'=>"• الـغـاء ❎",'callback_data'=>"back1"]],
]
])
]);
}
if($data == "movies"){
bot('editMessageCaption',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'caption'=>"
*اهلا بك $name في بوت فشار استمتع بكل انواع الافلام مجاني بدون اعلانات *
",'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
      'inline_keyboard'=>[
[['text'=>"مسلسلات ",'callback_data'=>'v#0'],['text'=>"افلام",'callback_data'=>'v#1']],
[['text'=>"اوفا",'callback_data'=>'v#2'],['text'=>" اونا",'callback_data'=>'v#3']],
[['text'=>"كوميدي",'callback_data'=>'v#4'],['text'=>"اكشن",'callback_data'=>'v#5']],
[['text'=>"خيال",'callback_data'=>'v#6'],['text'=>"مغامرة",'callback_data'=>'v#7']],
[['text'=>"شونين",'callback_data'=>'v#8'],['text'=>"خيال علمي",'callback_data'=>'v#9']],
[['text'=>"رومانسي",'callback_data'=>'v#10'],['text'=>"مدرسي",'callback_data'=>'v#11']],
[['text'=>"خارق للطبيعة",'callback_data'=>'v#12'],['text'=>"سينين",'callback_data'=>'v#13']],
[['text'=>"غموض",'callback_data'=>'v#14'],['text'=>"إيتشي",'callback_data'=>'v#15']],
[['text'=>"الحياة اليومية",'callback_data'=>'v#16'],['text'=>"تاريخي",'callback_data'=>'v#17']],
[['text'=>"ميكا",'callback_data'=>'v#18'],['text'=>"قوى خارقة",'callback_data'=>'v#19']],
 [['text'=>"رجوع",'callback_data'=>"back1"]],
]])
]);
}
$ex = explode("#",$data);
$url = movie($ex[1]);
$info = json_decode(file_get_contents("https://dev-sherif.online/MBots/y1.php?f=".$url),true);
if ($ex[0] =="v"){
for($i=0;$i<=count($info);$i++){
$l=$info[$i]["title"];
$url=$info[$i]["url"];
$anime3rb[$from_id][$i]=$url;
file_put_contents("data/$from_id.json",json_encode($anime3rb,64|128|256));
$reply_markup['inline_keyboard'][] = [['text'=>"".$l,'callback_data'=>"l#$i"]];
}
$reply_markup['inline_keyboard'][] = [['text'=>"التالي ",'callback_data'=>"next#$ex[1]#1"]];
$reply_markup['inline_keyboard'][] = [['text'=>"رجوع",'callback_data'=>"back1"]];
$reply_markup = json_encode($reply_markup);
bot('editMessageCaption',[
'chat_id'=>$chat_id,
'message_id' =>$message_id,
'caption'=>"
* - يرجي اختيار الفيلم *
",'parse_mode'=>"Markdown",
'reply_markup'=>$reply_markup
]);
}

if($ex[0]=='l'){
$url1 = $anime3rb[$from_id][$ex[1]];
$info = json_decode(file_get_contents("https://dev-sherif.online/MBots/y1.php?info=".$url1),true);
$name =$info["title"];
$star=$info["star"];
$s=$info["story"];
if(preg_match('/titles/',$url1)){
for($k=0;$k<count($info['episode']);$k++){
$key = $k +1;
$url = $info["episode"][$k]["url"];
$anime3rb[$from_id][$k]=$url;
$anime3rb[$from_id]['exit']=$url1;
file_put_contents("data/$from_id.json",json_encode($anime3rb,64|128|256));
$reply_markup[] = ['text'=>"الحلقة $key",'callback_data'=>"l#$k"];
}
$reply_markup['inline_keyboard']=array_chunk($reply_markup,2);
}else{
$reply_markup['inline_keyboard'][] = [['text'=>"• للمشاهدة والتحميل ⬇️ •",'callback_data'=>"hello"]];
$reply_markup['inline_keyboard'][] = [['text'=>"• مشاهدة 🎬 •",'url'=>"https://nailspansseh.com/api/v.php?v=".$info['whatch']]];
for($k=0;$k<count($info["down"]);$k++){
$url= $info["down"][$k]["url"];
$q= $info["down"][$k]["q"];
$reply_markup['inline_keyboard'][] = [['text'=>"$q - ".$info["down"][$k]["size"],'url'=>"https://nailspansseh.com/api/v.php?v=".$url]];
}}
$reply_markup['inline_keyboard'][] = [['text'=>"رجوع",'callback_data'=>"back1"]];
$reply_markup = json_encode($reply_markup);
if($info['photo']!==null){
bot('editMessageMedia',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'media'=>json_encode([
'type'=>'photo',
'media'=>$info['photo'],
'caption'=>"*
🎬 الاسم :* [$name]($url1)

*⭐ التقييم : $star / 10

🎞️ القصة : $s

*",'parse_mode'=>"Markdown"
]),
'reply_markup'=>$reply_markup
]);}else{
bot('editMessageReplyMarkup',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'inline_message_id'=>$message_id->inline_query->inline_message_id,
'reply_markup'=>$reply_markup,
]);
}
}

if ($ex[0]=="next" or $ex[0]=="back"){
if($ex[0]=="back"){$k=$ex[2] -1;}else{$k=$ex[2] +1;}
if($k <=1){$k=1;}
$url = movie($ex[1],$k);
$info = json_decode(file_get_contents("https://dev-sherif.online/MBots/y1.php?f=".$url),true);
for($i=0;$i <count($info);$i++){
$l = $info[$i]["title"];
$url = $info[$i]["url"];
$anime3rb[$from_id][$i]=$url;
file_put_contents("data/$from_id.json",json_encode($anime3rb,64|128|256));
$reply_markup['inline_keyboard'][] = [['text'=>"".$l,'callback_data'=>"l#$i"]];
}
if($l==1){
$reply_markup['inline_keyboard'][] = [['text'=>"التالي ",'callback_data'=>"next#$ex[1]#$k"]];
}elseif($l!==null){
$reply_markup['inline_keyboard'][] = [['text'=>"السابق ",'callback_data'=>"back#$ex[1]#$k"],['text'=>"التالي ",'callback_data'=>"next#$ex[1]#$k"]];
}elseif($l==null){
$reply_markup['inline_keyboard'][] = [['text'=>"السابق ",'callback_data'=>"back#$ex[1]#$k"]];
}
$reply_markup['inline_keyboard'][] = [['text'=>"رجوع",'callback_data'=>"back1"]];
$reply_markup = json_encode($reply_markup);
bot('editMessageCaption',[
'chat_id'=>$chat_id,
'message_id' =>$message_id,
'caption'=>"
* - يرجي اختيار الفيلم *
",'parse_mode'=>"Markdown",
'reply_markup'=>$reply_markup
]);
}

if ($text && $text !=="/start" ){
$info = json_decode(file_get_contents("https://dev-sherif.online/MBots/y1.php?s=".$text),true);
$count=count($info);
for($i=0;$i< $count;$i++){
$l = $info[$i]["title"];
$url = $info[$i]["url"];
$anime3rb[$from_id][$i]=$url;
file_put_contents("data/$from_id.json",json_encode($anime3rb,64|128|256));
$reply_markup['inline_keyboard'][] = [['text'=>"".$l,'callback_data'=>"l#$i"]];
}
if ($count==null){
$reply_markup['inline_keyboard'][] = [['text'=>"• عذرا لم اعثر علي نتيجة 🌚",'callback_data'=>"viw"]];
}
$reply_markup['inline_keyboard'][] = [['text'=>"رجوع",'callback_data'=>"back1"]];
$reply_markup = json_encode($reply_markup);
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>"https://b.top4top.io/p_2603dgm0y1.jpg",
'caption'=>"
* - يرجي اختيار الفيلم *
",'parse_mode'=>"Markdown",
'reply_markup'=>$reply_markup
]);
}
unlink('error_log');

