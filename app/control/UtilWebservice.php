<?php

class UtilWebservice
{

	public static $HOST_NAME = "http://localhost/";
	public static $PROJECT_NAME = "novo_assema/";
	public static $WEBSERVICE_DIRECTORY = "app/service/site/";

	//public static $HOST_NAME = "http://ceres.rn.gov.br/";
	//public static $PROJECT_NAME = "novo_assema/";
	//public static $WEBSERVICE_DIRECTORY = "app/service/site/";


	public static $SUCCESS_TAG = "success";
	public static $DADOS_TAG   = "dados";
	public static $ERROR_TAG   = "error";

	public static function callWebservice( $webserviceName, $parameters, $method )
	{

		$getData = http_build_query( $parameters );

		$opts = array( 
				'http' => array( 
						'method'  => $method, 
						'content' => $getData ) );

		$context  = stream_context_create( $opts );

		$jsonData = file_get_contents( UtilWebservice::getWebserviceURL( $webserviceName ), false, $context  );

		/*var_dump( $jsonData );
		exit; */

		return json_decode( $jsonData, true );

	}
	
	public static function callWebserviceFile( $webserviceName, $parameters, $method )
	{
	
		$getData = http_build_query( $parameters );
	
		$opts = array( 'http' => array( 
				'method'  => $method, 
				'headers' => 'Content-Type: multipart/form-data',
				'content' => $getData ) );
	
		$context  = stream_context_create( $opts );
	
		$jsonData = file_get_contents( UtilWebservice::getWebserviceURL( $webserviceName ), false, $context  );
	
		return json_decode( $jsonData, true );
	
	}

	public static function getWebserviceURL( $webserviceName )
	{

		return UtilWebservice::$HOST_NAME . UtilWebservice::$PROJECT_NAME . UtilWebservice::$WEBSERVICE_DIRECTORY . $webserviceName . ".class.php";

	}

}

 ?>
