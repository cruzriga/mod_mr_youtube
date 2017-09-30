<?php	
	// No direct access
	defined('_JEXEC') or die;
	/*
		modulo mrYoutube
		@author  cruzriga
	*/

	// clase principal en el helper
	class modmrYoutube
	{
		/*
			getVideosData 
			@param  object $params 	objeto con paramertos de Joomla 
			@return Array 			array con la lista y datos de los videos de youtube

		*/
		public static function getVideosData($params){
			//mr_youtube_video_list
			//mr_youtube_video_tumb_size_y
			//mr_youtube_video_tumb_size_x
			//mr_youtube_video_total_videos
			//se captura la lista del input mr_youtube_vide_list (string)
			$list = $params->get('mr_youtube_video_list');
			// ejecuto la funcion loadLista y le mando la lista como string
			return (self::youtubeVideoLoadList($list));

		}
		/*
			breve de la funcionalidad del objeto aislado a documentar. <br />
			 * Explicación detallada del objeto.
			 * @param  	string 	$list 		Lista de ids de videos concatenados por (,)
			 * @return 	Array 	$listVideos titulo, imgUrl, (url de la img) descript(descipcion del video ), videoUrl (url del video para el embed) q (url del query)		
			 * @author  cruzriga
		*/
		public static function youtubeVideoLoadList($list){	
			 	$ApiKey 	= "&key=AIzaSyBWZeRuZW64iJxumP1PxCkqX5SEWvOoxWM";
			 	$q			= "&q=";
			 	// actualizacion del api v3 de google
			 	// https://www.googleapis.com/youtube/v3/search?part=snippet&q=JPDHm4U5a54&type=video&key=AIzaSyBWZeRuZW64iJxumP1PxCkqX5SEWvOoxWM
			 	 $url 		="https://www.googleapis.com/youtube/v3/search?part=snippet&type=video";
			     $listVideos = array();  
				 $lista 	= explode(",",$list);

				 foreach($lista as $key => $videoID){
					// captura la info del video de la url ( se concatena )
				   	$get 	= file_get_contents($url.$q.$videoID.$ApiKey);
				   	// decodifica el json que retorna  a un array asociativo 
					$json 	= json_decode($get,true);
					// ubico el item dentro el array 
					$item 	= $json["items"][0]['snippet'];
					// asigno el titulo 
					$title 	= $item['title'];
					// lo convierto a mayusculas 
					$title 	= strtoupper($title);
					// capturo la url de la vista previa ( exiten mas formatos )
					$thumbnail 	= $item['thumbnails']['medium']['url'];
					// la descripción del video 
					$content 	= $item['description'];
					//armo el array de los videos 
					$listVideos[]=array("titulo" 	=> $title,
										"imgUrl" 	=> $thumbnail,
										"descript" 	=> $content,
										//"videoUrl" =>"//www.youtube.com/embed/".$videoID
										"videoUrl" 	=>"https://www.youtube.com/watch?v=".$videoID,
										"q" 		=> $url.$q.$videoID.$ApiKey
										);
				}
				 
			// retorno la lista de videos en un array 
			return($listVideos);
		}
	}


?>