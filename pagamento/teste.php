<?php
    $url = 'https://api.pgbank.com.br/v2/charges';

    $headers = array(
        'Content-Type: application/json',
        'X-Access-Token: 
        42f2a97e-f5f6-4b9f-aaa1-788cb73a74d25ee1efa44446be264fb88d90b740417a7f27-7415-446c-8061-05971d9b5233',
    );
    
    $data = array(
        'amount' => 100.00,
        'description' => 'Compra na Loja',
        // Outros parâmetros necessários
    );
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    // O $response conterá os dados da transação, incluindo o link de pagamento
    

?>