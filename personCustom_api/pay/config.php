<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016101300679263",

		//商户私钥
		'merchant_private_key' => "MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCIjAffVKvaidKfXJ9Q9PFzifjIuthw6gd6FF0WbHtkPSt/oBbjHXtAyivfyOclbciKH096Ea28Y7JUd73kkhbbXxqFpFEbdhXhMRC+EMjip13XkKDIvUnoNYAxH31U64ldORrWtAhV7Ca1EHmcNDBfWQ+IMhRscITNI1wOSFb0TGZAJrnFBxS9ERXByv3w+0d8gIRAuAlvmezcy0CPLL3T309LKmknATdjO7SpmZQ23Ju8P4d4hq1Ggud/RVoHoJnzPTkK/gC4AfgQT5AVWhcMVqiOCAgQGvVf05PxXDFFpFKBTIQLZSE/XrN4O6ohLwqYJ2l4lbHYF+xT8YcVnFdzAgMBAAECggEATiZ/FvY6CbEaCDWVxVr7mlocNp6h5DY9o0RmZsAd+yf7bmcs0j38Xf+YDtPIX6auwUbcUQwvOISC+08xMtHeHR4Yaua5uRLjwOg5Id8vanHKBudy7pFP7IQ6Y2MXc3P/QYi+cKXHo42uNbFBOQKxsNCjUBsBj3Lyvwn+1PnYMqd0eiWQ6hOJiRx7hd4HKebQsKsQUqRD4IUZR2wCy+IQyJI1Zk+aKgRB68PVj7JAgWi/+PPtM7IF9tz/HVo+u+IvIauOCwUNTtMqsJO/u4svamUoaZUlvbJIl2N2aq+v7UtiDzRgsmN+x1qJCvk0Lyxhy4mEzJH/bg/nMpY27p/5yQKBgQDMfIWFq/aJpx4KpIsV431y6gJR7YopQ0PxvETL2vwk0BgU98rEBhRGazcZe779uamxDCZQtTWkZa7sf/o1GNCKVFTzsZClACZJv1qsuRc7t2OVevqt8dNMJWTmqEkPN40VWxQd9IZ/zEuUdd/rBIRa2vfNaY06fJciAZDXJKXUHwKBgQCq8gvilsrOzJuFkQhQ/qyuHeHXkVSqZLez/jh8OcwrcP/M+nUGTJUXBmgloMZkJmO9itdirYJQT0xYyM6PQlTHyc4EWAVEfJRbGbR6bG/hutDjpiltkFixwURpK696AmI8l6t2bhea2ArB/MfY2nlHwp+V5uV+qqhRsWEX3fgyLQKBgB6YqynbFyJ1nOsev6jgxw6AsSQtFLUj2XC8KNcPxxaDBHdutCosdrAqrq3jdCpms1tIZBtDYeldRZUheQCk2982yxdDhE8L/K6gMSMS9sT6pa3iHswUGPeVyMkyeOwL9dIyNIpe4hkRKmXmVUDHBj7J8LYNixIrPjnaXh+y3hUlAoGBAIBHECoh0+CpY48wTVhSNAyYue/EzA7tc3jrLUHzMUXsDtinnYdzknFryl1qL1XaBQCoHoabA232g6kgTvjr4qjlw+Y4kwNYpQ9T074Gf1KZmMUr3GyuZBBHoml1ccGR5lvnyLAfXzFAK5p0cRdGorn5zz1yvgZ2U8ax39VEKUqlAoGBAJWmwvckBxagJw6W4dXpoIZqslCCVw5eAOOdLx2nfkxFivBhExUIKtJRqi3eLIj2LUIWhW3AvRnNqFbwIb8u1oDdRHZdFZHOkgImwPUbn8m5JBJ+8F++OUzTYjK3mAhGKUwFWpjSmyk/ISVnYqce5UxsPGs4OcN3ZF6ln0xXY7+V",
		
		//异步通知地址
		'notify_url' => "http://47.96.175.28/personCustom_api/pay/notify_url.php",
		
		//同步跳转
		'return_url' => "http://47.96.175.28/personCustom_api/pay/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEApF1goVmfvVtkL7wdo8Sv43iLnBelz2AOuKoNV3WGh5RFydf6bKBFK7JKJOugCH4hoG1o3PamAAMq4kB77zfvN3/JliJ6Vvva/jUwJx102AytRiZQ8Wj04XgstPRt0G16VfW5FYS2VfBiNGU8pudly0Aa+L6xRI9QJtKwINX914I5caFLrHywQ6YgkN21xq5ZMx3MzJ/HWLcqIWk8jvcgwJuEOOJfifdmTTYU0ffQnWyeqlv1qJLJ3uWLnp/K8UjKJn4ZnxEOijjrwk/QRKyrAymF/h5m/JEh5BiAF3XvE4Immuqa0K/FlzmPBrCRby8OXWwu5RtE6yxtIeqWhXO2kQIDAQAB",
);