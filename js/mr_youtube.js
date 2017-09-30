

 function modYt (data){
 	var that = this; // SE TRABAJA CON THAT EN LUGAR DE THIS, PARA EVITAR CONFLICTOS CON OTROS OBJETOS 
 	this.data = data;
 	this.node = "#mr_youtube_"+this.data.mod_id;
 	
 	this.ini = function (){
 		// CREO EL BOX SLIDER DEL PLUGGIN DE EL SLIDER 
 		jQuery(this.node).bxSlider({
 				 				  minSlides: 	that.data.cols,
								  maxSlides: 	(that.data.cols+1),
								  slideWidth: 	that.data.w,
								  slideMargin:  that.data.margin,
								  auto: 		that.data.auto,
  								  mode: 		that.data.mode,
								  speed: 		that.data.speed,
								  controls: 	that.data.controls,
								  pause: 		that.data.pause,
								  ticker: 		that.data.ticker,
								  autoHover: 	true
 		});
 		/*
	 	jQuery(document).on('click',this.node+" li a",function(event){
			
	 		 event.preventDefault();
	 		 that.ligthboxYt(this);
	 		
	 	});
		*/
 	}
 	// INICIALIZO EL OBEJATO 
 	this.ini();
 	
 	this.ligthboxYt = function(a){
 			 				jQuery.lightbox.open({'href':jQuery(a).attr("href"),
			 						 'type':'', 
			 						 'title': jQuery(a).attr("title"),
			 						  'width':'640',
			 						  'titlePosition':'inside'
									});
 						}


 	}