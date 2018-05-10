
<style>
	.input *{
		margin-bottom: 15px; 
	}	
	.button.preview, .button.publish, .shortcode{
		display: none;
	}  
	.shortcode{
		text-align:right;
		margin-top:-12px; 
		clear:both;

	}
	p.prevw-btn {
    	margin-bottom: 47px;
	}
	.preview-col{
		border-left: 1px #000 thin;
	}
	.col-half {
		width:50%;
		float:left;
	}
	.gmap-img-preview img{
		height: 120px;
		width: 120px;
		max-height: 140px;
		max-width: 140px;
		margin:2%;
		float:left;
	}
	.prevw-btn input{
		margin-right: 20px;
	}
	.code-container{
		margin-bottom: 20px;
		display: none;
	}
	
	a.toplevel_page_appxi-wp-niftymaps.current .wp-menu-image{
			 height:20px;
		   padding-bottom:3px;
	}
</style>


<h2>AppEleven Nifty Maps <?php echo $var; ?> </h2> 
<div class="wrap row-fluid">    
	
	<div class="row">
		<div class="col-md-12">
		 	<div class="manage-menus code-container">
 					<span class="add-edit-menu-action add-success">
						You've added a new Google Map <span class="use-code"></span> 
					</span><!-- /add-edit-menu-action -->
				</div>
			<div class="col-md-8">  
				 
				<div id="side-sortables" class="accordion-container">
					<ul class="outer-border">
						<li class="control-section accordion-section " >
							<h4 class="accordion-section-title hndle" tabindex="0">
							 Configuration <span class="screen-reader-text">Press return or enter to expand</span>
							</h4>
							<div class="accordion-section-content" style="display:block;">
								<div class="inside">
									<div class="col-md-12">
									  	<div class="col-half">
									  		
									  	<div class="input">
												<label for="gmap-name">New Google Key <br> <br> 
													<input type="text" name="gmap_key" size="60" placeholder="This is your new api key" value="" id="gmap-key" spellcheck="true" autocomplete="off">
												</label>
												
												<p> <a href="#" class="revert-key">Revert Back to Original Key</a> here <br> </p>
									 
											</div>
												 
									 				<input type="button" id="save-key" class="button action" value="Save"> &nbsp; &nbsp;
									 				<input type="button" id="revert-key" class="button action button-primary" value="Revert"> &nbsp; &nbsp;
									 			 
									  	</div>  
								 
									</div>											
								</div><!-- .inside -->
							</div><!-- .accordion-section-content -->
						</li><!-- .accordion-section -->
						
					</ul><!-- .outer-border -->
				</div>
				<br>
			</div>
		</div>
	</div>

</div><!--- End Wrap -->
