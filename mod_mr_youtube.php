<?php 
	// No direct access	
	defined('_JEXEC') or die;
	// incluyo las clases o archivos necesarios, principalmente el Helper
	ini_set('allow_url_fopen', 1);
	require_once( dirname(__FILE__) . '/helper.php' );

	//llamo una funcion que esta en el archivo helper dentro de su clase 
	$yt = modmrYoutube::getVideosData($params);
	
	//inserto los archivos js o css al joomla 
		$document = JFactory::getDocument();
		$document->addStyleSheet('media/bxslider/bxslider/jquery.bxslider.css');
		$document->addScript('media/bxslider/bxslider/jquery.bxslider.min.js');
		$document->addScript('modules/mod_mr_youtube/js/mr_youtube.js');
		//NO SE AGREGA JQUERY YA QUE EL TEMPLATE YA TIENE JQUERY FUNCIONANDO 
		//$document->addCustomTag('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>');
		
	
	//CREO EL SCRIPT DE DOCUMENT ON LOAD, PARA INICIALIZAR EL SLIDER 
		//se crea un id unico por slider y asignado por los parametros.  
		$modId 	= $params->get('mr_youtube_id');
		$ancho 	= $params->get('mr_youtube_video_tumb_size_x');
		$alto 	= $params->get('mr_youtube_video_tumb_size_y');
		$cant 	= $params->get('mr_youtube_video_total_videos');
		$margen = $params->get('mr_youtube_video_tumb_margin');

		$auto 	= $params->get('mr_youtube_auto');
		$mode 	= $params->get('mr_youtube_mode');
		$speed 	= $params->get('mr_youtube_speed');
		$controls = $params->get('mr_youtube_controls');
		$pause 	= $params->get('mr_youtube_pause');
		$ticker = 'false';

		if($mode == 'ticker'){
			$ticker = 'true';
			$mode = '';
		}

		// Javasript que crea el objeto en el frontend
		$script = "if (typeof mr_yt_".$modId." == 'undefined'){";
					// SOLI SI NO EXISTE EL OBJETO, INICIALICELO 
		$script .= " mr_yt_".$modId." =  new modYt({
													mod_id : '".$modId."',
													w : '".$ancho."',
													alto : '".$alto."',
													cols : ".$cant.",
													margin : ".$margen.",

													auto : ".$auto.",
													mode : '".$mode."',
													speed : ".$speed.",
													controls : ".$controls.",
													pause : ".$pause.",
													ticker: ".$ticker."


				
												
													});";
		$script .= "}";
	// LLAMO EL HELPER
	require( JModuleHelper::getLayoutPath('mod_mr_youtube'));
?>