<?php 
// No direct access
defined('_JEXEC') or die; 
?>

<div id="mr_youtube_container" >
	<ul class="bxslider" style = "padding: 0;" id="mr_youtube_<?php echo $params->get('mr_youtube_id'); ?>" >
		<?php
			foreach ($yt as $index => $info):
				foreach ($info as $campo => $valor){$$campo = $valor;}
		?>
	    <li >
	   		<a class="uk-thumbnail" href="<?php echo $videoUrl; ?>" data-lightbox="{group:'mr_yt_<?php echo $params->get('mr_youtube_id')?>'}" type="YouTube" title="<?php echo $titulo; ?>">	
	            <img src="<?php echo $imgUrl; ?>"  alt="<?php echo $titulo; ?>" longdesc="<?php echo $descript; ?>"/>
	            <div class="uk-thumbnail-caption"><?php echo substr($titulo,0,60); ?></div>
	    	</a>	
	    </li>
	   	<?php
	   		endforeach; 
	   	?>
	</ul>
	<script><?php echo $script ?></script>	   
</div>

