<?php
	// 
	// API для оплаты через сбербанк
	//
	
	//API SBERBANK
	define( 'SBER_LOGIN', 'XXXXXX-api' );
	define( 'SBER_PASSWORD', 'XXXXXX' );
	
	//Тестовый
	//define( 'SBER_API', 'https://3dsec.sberbank.ru/payment' );
	
	//Боевой
	define( 'SBER_API', 'https://securepayments.sberbank.ru/payment' );
	
	//
	// СОЗДАЕМ ЗАКАЗ В СБЕРБАНКЕ
	//
	
	// Возвращает:
	// {
	//   "orderId":"70906e55-7114-41d6-8332-4609dc6590f4",
	//   "formUrl":"https://3dsec.sberbank.ru/payment/merchants/test/payment_ru.html?mdOrder=70906e55-7114-41d6-8332-4609dc6590f4"
	// }
	
	
	function register_do($data){
		$url = SBER_API."/rest/register.do";
		$amount = $data->amount*100;
		
		$register_do = array (
			'orderNumber' => $data->orderNumber,
			'amount' => $amount,
			'userName' => SBER_LOGIN,
			'password'=> SBER_PASSWORD,
			'description' => $data->description,
			'returnUrl' => $data->return_url,
			'failUrl' => $data->fail_url,
			'email' => $data->email
		);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// Указываем, что у нас POST запрос
		curl_setopt($ch, CURLOPT_POST, 1);
		// Добавляем переменные
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($register_do));
		
		//Пытаемся списать деньги
		$output = curl_exec($ch);
		
		curl_close($ch);
		
		$response = json_decode($output, true);
		
		return $response;
	}
	
?>