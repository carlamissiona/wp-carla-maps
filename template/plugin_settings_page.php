
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
	
	a.toplevel_page_appxi-wp-niftymaps.current .wp-menu-{
			background-color:none!important;		
		  text-decoration:underline; 
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
								Add New  <span class="screen-reader-text">Press return or enter to expand</span>
							</h4>
							<div class="accordion-section-content"  >
								<div class="inside">
									<div class="col-md-12">
									  	<div class="col-half">
									  		
									  		<div class="input">
												<label for="gmap-name">Map Name <br> 
													<input type="text" name="gmap_name" size="60" placeholder="This is your new gmap" value="" id="gmap-name" spellcheck="true" autocomplete="off">
												</label>
											</div>
											<div class="input">										 
												<label for="gmap-desc">Description <br>
													<input type="text" name="gmap_desc" size="60" placeholder="Add a description" value="" id="gmap-desc" spellcheck="true" autocomplete="off">
												</label>	
											</div>
											<div class="input">										 
												<label for="gmap-lat">Lat <br>
													<input type="text" name="gmap_lat" size="60" placeholder="Add a latitude" value="" id="gmap-lat" spellcheck="true" autocomplete="off">
												</label>	
											</div>
                                            <div class="input">										 
												<label for="gmap-lang">Lang <br>
													<input type="text" name="gmap_lang" size="60" placeholder="Add a longitude" value="" id="gmap-lang" spellcheck="true" autocomplete="off">
												</label>	
											</div> 
										
												<br>
												<br>
									 				<input type="submit" id="prevw-map" class="button action" value="Publish Map"> &nbsp; &nbsp;
									 				<input type="submit" id="publish-map" class="button action publish button-primary" value="Publish">
									  	</div>  
										<!-- preview images -->
										<div class="col-half preview-col">
											
										 
														 <div class="input">										 
																<label for="gmap-zoom">Initial Zoom  And Css Class </label> <br>
																	
															   <input type="number" min=".5" max="5" name="gmap_zoom" value="5" id="gmap-zoom" spellcheck="true" autocomplete="off">
														 
																 <input type="text" name="gmap_class"  style="width:250px;height:auto;font-size:13px;padding:5px 3px"  placeholder="Add a container class" value="" id="gmap-class" spellcheck="true" autocomplete="off">
															</div>
																	
															<div class="input">										 
																<label for="gmap-lang">Map Type & Locale<br>
																</label>	
																<select name="gmap_locale" class="map_locale" id="gmap-locale">
																	<option value="en">English</option>
																	<option value="ja">Japanese</option>
																	<option value="zh">Chinese</option>
																	<option value="fr">French</option>
																	<option value="ar">Arabic</option>
																	<option value="de">German</option>
																	<option value="ru">Russian</option>
																	<option value="el">Greek</option>
																</select>  &nbsp;  &nbsp; 
																<select name="gmap_type" class="map_type" id="gmap-type">
																	<option value="roadmap">Choose Map Option</option>
																	<option value="roadmap">Road</option>
																	<option value="terrain">Terrain</option>
																	<option value="satellite">Satellite</option>
																</select>
															</div>

											

											
											
											
											<p> <a href="<?php echo  site_url( '/wp-admin/admin.php?page=appxi-wp-niftymaps+key' ); ?>">Edit Default Settings </a> here <br> </p>
											<p>You can use the shortcode in WP editor or on your theme files [awg id="99999" ]</p>
											<p class="prevw-btn"> 
											<input type="button" value="Publish" class="button button-primary publish" />	</p>									
											
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
	<div class="row">
		<div class="col-md-12">
				
			<div class="col-md-8">
				<table class="wp-list-table widefat fixed striped bookmarks">
					<thead>
						<th colspan="1">ID</th>
						<th colspan="2">Google Map</th>
						<th>Description</th>
						<th>Shortcode</th>
						<th >Date Created</th>
						<th>
							
							<select name="" id="delete_map">
								<option value="">Bulk Actions</option>
								<option value="">Delete</option>
							</select>
							<input id="cb-select-all-1" type="checkbox">  	

						</th>
					     	

                <?php  foreach ($maps as $v) { ?>
						 			<tr class="map_record">
										<td><?php echo $v['map_id']; ?></td>
						 				<td><?php echo $v['name']; ?></td>
						 				<td></td>						 			   
						 				<td><?php echo $v['desc']; ?></td>
						 				<td><?php echo $v['shortcode']; ?></td>
						 				<td><?php echo $v['date_created']; ?></td>
						 			 
						 				<td>
                                          <span style="float:right;">
                                                  <input value="<?php echo $v['map_id']; ?>" type="checkbox">  
                                          </span>
<!-- 						 				 	<span style="float:right; margin-right:15px;" class="dashicons dashicons-edit"></span>
											<span style="float:right; margin-right:15px" class="dashicons dashicons-trash"></span> -->
						 					
						 				</td>

						 			</tr>	
						<?php } ?>
					</thead>
				</table>		
				 
			</div>
		</div>
		 
	</div>
</div><!--- End Wrap -->
