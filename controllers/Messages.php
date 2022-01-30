<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();
  
$app->get('/SendMessage', function (Request $request, Response $response){

             $apiurl = 'YOUR_API_KEY_FROM_WHATSAPP_CHAT_API';
             $token = 'YOUR_TOKEN';

            $chatId = '255655007457@c.us';
            $text =  'Hello there im testing my API';
            $method = 'message'; // Normal messages
  
            $data = array('chatId' => $chatId, 'body' => $text);

            $url = $apiurl . $method . '?token=' . $token;
           
            if (is_array($data)) {
                $data = json_encode($data);
            }
            $options = stream_context_create(['http' => [
                    'method' => 'POST',
                    'header' => 'Content-type: application/json',
                    'content' => $data]]);
            $response_message = file_get_contents($url, false, $options);
            echo $response_message;
});



$app->get('/SendFileMessage', function (Request $request, Response $response){

             $apiurl = 'YOUR_API_KEY_FROM_WHATSAPP_CHAT_API';
             $token = 'YOUR_TOKEN';

            $chatId = '255655007457@c.us';
            $caption =  'Hello there this is the caption';
            $method = 'sendFile'; //
            $path = 'https://cutt.ly/1Oji2Vw';
            $filename = 'Image Demo';
  
            $data = array('chatId' => $chatId,'body' => $path,'filename' => $filename,'caption' => $caption);


            $url = $apiurl . $method . '?token=' . $token;
           
            if (is_array($data)) {
                $data = json_encode($data);
            }
            $options = stream_context_create(['http' => [
                    'method' => 'POST',
                    'header' => 'Content-type: application/json',
                    'content' => $data]]);
            $response_message = file_get_contents($url, false, $options);
            echo $response_message;
});

















