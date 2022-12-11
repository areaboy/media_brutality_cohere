
<?php

error_reporting(0);
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);

?>







<?php

$timer = time();

$content = strip_tags($_POST['desc']);
$name = strip_tags($_POST['name']);



include('settings.php');
// Ensure that Cohere ai api key is set from Application settings Menu
if($cohere_apikey_token ==''){
echo "<br><div id='alertdata_uploadfiles_o' style='background:red;color:white;padding:10px;border:none;'>
Please Ensure to set Cohere ai Apikey Token from Application settings.php file </div><br>";
exit();	
}



$curl = curl_init();

$data_param=$content;

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.cohere.ai/classify",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"inputs\":[\"$data_param\"],\"examples\":[{\"text\":\"The order came 5 days early\",\"label\":\"positive review\"},{\"text\":\"The item exceeded my expectations\",\"label\":\"positive review\"},{\"text\":\"I ordered more for my friends\",\"label\":\"positive review\"},{\"text\":\"I would buy this again\",\"label\":\"positive review\"},{\"text\":\"I would recommend this to others\",\"label\":\"positive review\"},{\"text\":\"The package was damaged\",\"label\":\"negative review\"},{\"text\":\"The order is 5 days late\",\"label\":\"negative review\"},{\"text\":\"The order was incorrect\",\"label\":\"negative review\"},{\"text\":\"I want to return my item\",\"label\":\"negative review\"},{\"text\":\"The item's material feels low quality\",\"label\":\"negative review\"},{\"text\":\"The product was okay\",\"label\":\"neutral review\"},{\"text\":\"I received five items in total\",\"label\":\"neutral review\"},{\"text\":\"I bought it from the website\",\"label\":\"neutral review\"},{\"text\":\"I used the product this morning\",\"label\":\"neutral review\"},{\"text\":\"The product arrived yesterday\",\"label\":\"neutral review\"}],\"model\":\"medium\",\"outputIndicator\":\"Classify this product review\",\"taskDescription\":\"Classify these product reviews as positive, negative, or neutral\"}",
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Bearer $cohere_apikey_token",
    "content-type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  //echo "cURL Error #:" . $err;

echo "<div style='background:red;color:white;padding:10px;border:none'>Error: $err . Could Not Connect to Cohere Sentiments API.  Ensure there is Internet Connections..</div><br>";

} else {
   $response;

$json = json_decode($response, true);
$id = $json["id"];
$inputs = $json["classifications"][0]["inputs"];
$prediction = $json["classifications"][0]["prediction"];
$confidence = $json["classifications"][0]["confidence"];


if($prediction == 'positive review'){
$image = 'happy.png';
$status= 'Happy: Nice Posts';
}


if($prediction == 'negative review'){
$image = 'sad.png';
$status= 'Sad: Sad Posts';
}


if($prediction == 'neutral review'){
$image = 'neutral.png';
$status= 'Mild: Mild Posts';
}

if($id !=''){
echo "<div style='background:green;color:white;padding:10px;border:none'>Posts Sentiments Successfully Analyzed.<br></div><br>

<b>Analyzed Posts Text:</b> $content<br>
<b>Sentiments Predictions:</b> $prediction<br>
<b>Sentiments Scores:</b> $confidence<br>
<b>Posts Sentiments Status:</b> $status<br>

<img class='' style='border-style: solid; border-width:3px; border-color:#8B008B; width:100px;height:100px; 
max-width:100px;max-height:100px;border-radius: 40%;' src='sentiments_image/$image' title='Image'>
";





}else{

echo "<div style='background:red;color:white;padding:10px;border:none'>Posts Sentimental Analysis Failed</div><br>";
exit();
}



}








$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.cohere.ai/classify",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"inputs\":[\"$data_param\"],\"examples\":[{\"text\":\"you are hot trash\",\"label\":\"Toxic\"},{\"text\":\"go to hell\",\"label\":\"Toxic\"},{\"text\":\"get rekt moron\",\"label\":\"Toxic\"},{\"text\":\"get a brain and use it\",\"label\":\"Toxic\"},{\"text\":\"say what you mean, you jerk.\",\"label\":\"Toxic\"},{\"text\":\"Are you really this stupid\",\"label\":\"Toxic\"},{\"text\":\"I will honestly kill you\",\"label\":\"Toxic\"},{\"text\":\"yo how are you\",\"label\":\"Benign\"},{\"text\":\"I'm curious, how did that happen\",\"label\":\"Benign\"},{\"text\":\"Try that again\",\"label\":\"Benign\"},{\"text\":\"Hello everyone, excited to be here\",\"label\":\"Benign\"},{\"text\":\"I think I saw it first\",\"label\":\"Benign\"},{\"text\":\"That is an interesting point\",\"label\":\"Benign\"},{\"text\":\"I love this\",\"label\":\"Benign\"},{\"text\":\"We should try that sometime\",\"label\":\"Benign\"},{\"text\":\"You should go for it\",\"label\":\"Benign\"}],\"model\":\"large\"}",
  CURLOPT_HTTPHEADER => [
    "Cohere-Version: 2021-11-08",
    "accept: application/json",
    "authorization: Bearer $cohere_apikey_token",
    "content-type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  //echo "cURL Error #:" . $err;
echo "<div style='background:red;color:white;padding:10px;border:none'>Error: $err . Could Not Connect to Cohere Toxicity Detection API.  Ensure there is Internet Connections..</div><br>";

} else {
  $response;


$json = json_decode($response, true);
$id = $json["id"];
$inputs = $json["classifications"][0]["inputs"];
$prediction = $json["classifications"][0]["prediction"];
$confidence = $json["classifications"][0]["confidence"];

if($prediction == 'Toxic'){

$predicts ="Toxic";
}else{

$predicts ="Non-Toxic";
}

if($id !=''){
echo "<div style='background:green;color:white;padding:10px;border:none'>Posts  Successfully Analyzed for Toxicity.<br></div><br>

<b>Analyzed Posts Text:</b> $content<br>
<b>Toxicity Predictions:</b> $predicts<br>
<b>Toxicity Scores:</b> $confidence<br>
";





}else{

echo "<div style='background:red;color:white;padding:10px;border:none'>Posts Toxcity Analysis Failed</div><br>";
exit();
}


}





?>

 