<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');

$length = rand(5,15);
$mean = rand(1,10);

$topic = array('height', 'intelligence', 'looks', 'feet', 'head', 'hands', 'home', 'job');
$topic = $topic[rand(0,count($topic) - 1)];

$prompt = '

Provide a unique funny insult from a Smurf about the person\'s '.$topic.'! Use approximately '.$length.' words. 

If meaness was ranked from 1 to 10, make this insult level '.$mean.' amount of meaness.

Reply with just the insult. Do not include any quotations in the response.

';

$apiKey = OPENAI_SECRET;
$data = [
    'model' => 'gpt-4o-mini',
    'messages' => [
        ['role' => 'system', 'content' => 'Write a detailed script'],
        ['role' => 'user', 'content' => $prompt]
    ],
    'max_tokens' => 200,
    'temperature' => 1,
    "frequency_penalty" => 0,
    "presence_penalty" => 0,
];

$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $apiKey, 'Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

$data = [
    'error' => 'false',
    'message' => 'Insult retrieved successfully',
    'insult' => $result['choices'][0]['message']['content'],
];

echo json_encode($data);