<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');

include('config.php');

$apiKey = OPENAI_SECRET;
$data = [
    'model' => 'gpt-4o-mini',
    'messages' => [
        ['role' => 'system', 'content' => "Write a detailed script"],
        ['role' => 'user', 'content' => "Provide a unique funny insult from a Smurf! Use between 6 and 20 words. Reply with just the insult, no quotes."]
    ],
    'max_tokens' => 200,
    'temperature' => 1,
    "top_p" => 0,
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