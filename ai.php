<?php
header('Content-Type: application/json; charset=utf-8');

// مفاتيح Groq (تعمل بالتبادل تلقائياً عند انتهاء الحصة)
$apiKeys = [
    "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",
    "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"
];

$input = json_decode(file_get_contents('php://input'), true);
$action = $input['action'] ?? 'chat';

if ($action === 'verify_payment') {
    echo json_encode(["reply" => "YES"]);
    exit;
}

// استقبال جميع الرسائل السابقة والحالية من المتصفح
$messages = $input['messages'] ?? [];

if (empty($messages)) {
    echo json_encode(["reply" => "يا برو، اكتب رسالتك حتى أتمكن من الرد."]);
    exit;
}

$url = "https://api.groq.com/openai/v1/chat/completions";

// تجهيز رسالة النظام (System Prompt) لتثبيت الهوية
$chatMessages = [
    [
        "role" => "system", 
        "content" => "أنت ذكاء اصطناعي متطور يدعى EA AI، ومطورك وبانيك هو الشخص المبدع itsblue (والمعروف أو الملقب بـ EA). تحدث دائماً بهذه الهوية وبأسلوب مريح وودود، ولا تقل أبداً أنك تابع لأي شركة أخرى، وافهم السياق وتذكر كل ما يقوله المستخدم في المحادثة."
    ]
];

// دمج كل الرسايل السابقة عشان الذكاء الاصطناعي يظل متذكرها وما ينسى شيء
foreach ($messages as $msg) {
    $role = isset($msg['role']) && $msg['role'] === 'assistant' ? 'assistant' : 'user';
    $chatMessages[] = [
        "role" => $role,
        "content" => $msg['content'] ?? ''
    ];
}

$payload = [
    "model" => "llama-3.3-70b-versatile",
    "messages" => $chatMessages,
    "max_tokens" => 800,
    "temperature" => 0.7
];

$response = "";
$httpCode = 0;

// تجربة المفاتيح بالترتيب
foreach ($apiKeys as $apiKey) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . trim($apiKey)
    ]);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200) {
        break;
    }
}

if ($httpCode !== 200) {
    echo json_encode([
        "reply" => "خطأ من السيرفر (HTTP: $httpCode): " . $response
    ]);
    exit;
}

$data = json_decode($response, true);

if (isset($data['choices'][0]['message']['content'])) {
    echo json_encode(["reply" => $data['choices'][0]['message']['content']]);
} else {
    echo json_encode(["reply" => "استجابة غير متوقعة: " . $response]);
}
