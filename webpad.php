<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<!-- WebPad™ : A Rich Text Editor for web                  -->
<!-- Powered by JJCH(Javascript-jQuery-CSS3-HTML5) -->
<!-- Designed & Developed by Somnath Muherjee      -->
<!-- Contact me : somnathbm0@gmail.com             -->
<!-- Project started on 3rd June,2014              -->
<!-- Project ended on 19th June,2014 (incl.debug)  -->
<!-- Stage : Complete                              -->
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<!DOCTYPE html>
<html>
 <head>
  <title>WebPad | a rich text editor</title>
  <meta charset = "utf-8" />
  <!-- ----SEO---- -->
  <meta name="keywords" content="text editor,rich text, rich text editor, text manipulation, w3c file save api" />
  <meta name="description" content="A rich text editor based on the CSS3 Text module" />
  <meta name = "author" content = "Author:Somnath Mukherjee,Project Type:Standalone" />
  <meta name = "viewport" content = "width=device-width,initial-scale=1.0" />
  <link rel="shortcut icon" href="img/favicon.png" />
  <link rel = "stylesheet" href = "css/libcss/bootstrap.css" />
  <link rel = "stylesheet" href = "css/libcss/jqueryui/jquery.ui.all.css" />
  <link rel = "stylesheet" href = "css/libcss/spectrum.css" />
  <link rel = "stylesheet" href = "css/Peanut.css" />
  <link rel = "stylesheet" href = "css/mainapp.css" />
 </head>
<body>
 <?php
	header("Access-Control-Allow-Origin:*");
 ?>
   <div class = "container">
   <!-- This row holds the editor -->
      <div class="row">
		<div class="col-sm-6 col-md-6 col-lg-6 col-sm-push-3 col-md-push-3 col-lg-push-3">
			<iframe id = "editr" name = "editr" src = "blank.html"></iframe>
			<div id = "t_bar" title = "Title bar">WEBPAD v1.0</div>
		</div>
	  </div>
   <!-- This row holds the virtual keyboard -->
	 <div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<div class="osk_wrapper">
						<!--clipboard function here-->
						<div class="col-lg-2">
							<span class = "legend">Align</span>
							<div class = "button-group">
								  <input type = "button" class = "keys" id = "left_align" title = "Left" value = "Left" />
								  <input type = "button" class = "keys" id = "ri8_align" title = "Right" value = "Right" />	 
								  <input type = "button" class = "keys" id = "cntr_align" title = "Center" value = "Center" />	 
							</div>   
						</div>
						<!-- font options here -->
						<div class="col-lg-2" id="font">
						  <span class = "legend">Font</span>
							<div class = "form-inline button-group">
							  <div class = "form-group">
								<label>Family</label>
							    <select class="form-control" id = "fname" title = "Font Name">
										<option value = "-Select-">-Select-</option>
										<option value = "Algerian">Algerian</option>
										<option value = "Segoe UI">Segoe UI</option>
										<option value = "Arial">Arial</option>
										<option value = "Impact">Impact</option>
										<option value = "Jokerman">Jokerman</option>
										<option value = "Broadway">Broadway</option>
										<option value = "Curlz MT">Curlz MT</option>
										<option value = "Pristina">Pristina</option>
								</select>
							 </div>
							 <div class = "form-group">
								<label>Size</label>
								<select class="form-control" id = "fsize" title = "Font Size">
										<option value = "-Select-">-Select-</option>
										<option value = "1">1</option>
										<option value = "2">2</option>
										<option value = "3">3</option>
										<option value = "4">4</option>
										<option value = "5">5</option>
										<option value = "6">6</option>
										<option value = "7">7</option>
							  </select>
							 </div>
                             <div class = "form-group">
								<label>Bold</label>
							    <input type = "radio" class = "iradio_flat-yellow" name = "iCheck" title = "Bold" id = "bold"/>
								<label>Italic</label>   
								<input type = "radio" class = "iradio_flat-yellow" name = "iCheck" title = "Italic" id = "italic" />
							 </div>							 
						  </div>
						</div>
						<!-- text options here -->
						<div class="col-lg-2">
								<span class = "legend">Text</span>
								<div class="button-group">
									<input type = "button" class = "keys" id = "u" title = "Underline" value = "Underline" />
									<input type = "button" class = "keys" id = "s" title = "Shadow" value = "Shadow" />
									<input type = "button" class = "keys" id = "l" title = "Create Link" value = "Link" />
								</div>
						</div>
						<!-- Transform options here -->
						<div class="col-lg-2">
								<span class = "legend">Transform</span>
								<div class = "button-group">
									 <input type = "button" class = "keys" id = "rotate" title = "Rotate" value = "Rotate" />
									 <input type = "button" class = "keys" id = "skewy" title = "Skew" value = "Skew" />
									 <input type = "button" class = "keys" id = "translate" title = "Translate" value = "Translate" />
								</div> 
						</div>
						<!-- Insert options here -->
						<div class="col-lg-2">
								<span class = "legend">Insert</span>
								<div class = "button-group">
									<input type = "button" class = "keys" id = "insert_img" title = "Insert Image" value = "Image" />
									<input type = "button" class = "keys" id = "insert_ruler" title = "Ruler" value = "Ruler" />
									<input type = "button" class = "keys" id = "insert_list" title = "Insert List" value = "Un.Ord.List" />
							    </div>
						</div>
						<!-- Color & File export options here -->
						<div class="col-lg-2">
								<span class="legend">Colors</span>
								<div class="form-inline button-group">
								 <div class="form-group">
									<label>Fore Color</label>
									<input type = "text" id = "color" title = "Fore Color" value = "#ee4248" />
								 </div>
								 <div class="form-group">
								    <label>Back Color</label></td>
								    <input type = "text" id = "bgcolor" title = "Background Color" value = "#a4ea1f" />
								 </div>
								</div> 
							  <div class="info_export">
								<form id = "export_form">
								   <input type="submit" class = "buttons button-pattern button-pattern-default" id = "saveXHTML" title = "Save as .HTML type only" value="Export" />
								   <input type="button" class="buttons button-pattern button-pattern-default" id="info" value="Info" />
							    </form>
							  </div>
						</div>
						<!-- Underline -->
						<div id = "underline" style = "height:auto;padding:10px;background-color:silver;display:none;">
						  <form id = "underl9Form">
						   <fieldset>
							<legend>Underline Options</legend>
							<table>
							 <tr>
							  <td><label>Underline Style</label></td>
							  <td><select id = "selLineStyle">
										<option value = "-Select-">-Select-</option>
										<option value = "solid">Solid</option>
										<option value = "double">Double</option>
										<option value = "wavy">Wavy</option>
										<option value = "dotted">Dotted</option>
										<option value = "dashed">Dashed</option>
								  </select></td>
							 </tr>
							 <tr>
							  <td><label>Underline Color</label></td>
							  <td><input type = "color" id = "selLineColor" value="#66cc99"/></td>
							 </tr>
							</table>		 
						   </fieldset>
							<input type = "button" id = "doApplyLine" value = "APPLY" />
						  </form>
						</div>
						<!-- Shadow -->
						<div id = "shadow" style = "height:auto;padding:10px;background-color:silver;display:none;">
						  <form id = "shadowform">
						   <fieldset>
							<legend>Shadow Options</legend>
							<table>
							 <tr>
							  <td><label>Shadow OffsetX</label></td>
							  <td class = "space"></td>
							  <td><input type = "text" name = "shadowx" value = "0.1" /></td>
							  <td class = "space"></td>
							  <td><select id = "unitOffsetX">
									<option value = "px" selected>px</option>
									<option value = "em">em</option>
								  </select></td>
							 </tr>
							 <tr>
							  <td><label>Shadow OffsetY</label></td>
							  <td class = "space"></td>
							  <td><input type = "text" name = "shadowy" value = "0.1" /></td>
							  <td class = "space"></td>
							  <td><select id = "unitOffsetY">
									<option value = "px" selected>px</option>
									<option value = "em">em</option>
								  </select></td>
							 </tr>
							 <tr>
							  <td><label>Shadow Blur</label></td>
							  <td class = "space"></td>
							  <td><input type = "text" name = "shadowblur" value = "0.5" /></td>
							  <td class = "space"></td>
							  <td><select id = "unitBlur">
									<option value = "px" selected>px</option>
									<option value = "em">em</option>
								  </select></td>
							 </tr>
							 <tr>
							  <td><label>Shadow Color</label></td>
							  <td class = "space"></td>
							  <td><input type = "color" name = "shadowcolor" value = "#ccc" /></td>
							 </tr>
							</table>	
						   </fieldset>
					   <input type = "button" id = "doApply" value = "APPLY" />
					 </form>
						</div>
					 <!-- Rotate -->
					 <div id = "rotation" style = "height:auto;padding:10px;background-color:silver;display:none;">
					  <form id = "rotateForm">
						<fieldset>
						 <legend>Rotate Options</legend>
						 <table>
						  <tr>
							<td><label>Rotate Angle(deg.)</label></td>
							<td class = "space"></td>
							<td><input type = "text" name = "rotate" id = "rotateVal" value = "45" /></td>
						  </tr>
						 </table>	  
						</fieldset>
						<input type = "button" id = "doRotate" value = "APPLY" />
					  </form>
					 </div>
					 <!-- Skew -->
					 <div id = "skew" style = "height:auto;padding:10px;background-color:silver;display:none;">
					  <form id = "skewForm">
						<fieldset>
						 <legend>Skew Options</legend>
						 <table>
						  <tr>
							<td><label>Skew Angle(deg.)</label></td>
							<td class = "space"></td>
							<td><input type = "text" name = "skew" value = "45" /></td>
						  </tr>
						 </table>	  
						</fieldset>
						<input type = "button" id = "doSkew" value = "APPLY" />
					  </form>
					 </div>
					 <!-- Translate -->
					 <div id = "translation" style = "height:auto;padding:10px;background-color:silver;display:none;">
						  <form id = "translateForm">
						   <fieldset>
							<legend>Translate Options</legend>
							<table>
							 <tr>
							  <td><label>Translate OffsetX</label></td>
							  <td class = "space"></td>
							  <td><input type = "text" name = "transx" value = "1" /></td>
							  <td class = "space"></td>
							  <td><select id = "trunitOffsetX">
									<option value = "px">px</option>
									<option value = "em">em</option>
								  </select></td>
							 </tr>
							 <tr>
							  <td><label>Translate OffsetY</label></td>
							  <td class = "space"></td>
							  <td><input type = "text" name = "transy" value = "1" /></td>
							  <td class = "space"></td>
							  <td><select id = "trunitOffsetY">
									<option value = "px">px</option>
									<option value = "em">em</option>
								  </select></td>
							 </tr>
							</table>	
						   </fieldset>
					   <input type = "button" id = "doTranslate" value = "APPLY" />
					 </form>
						</div>
					</div>
				</div>
		</div>
	 </div>
  </div>	
<script src = "js/lib/jquery/jquery-min.js"></script>  
<script src = "js/lib/jquery/jqueryui/jquery.ui.core.js"></script>
<script src = "js/lib/jquery/jqueryui/jquery.ui.widget.js"></script>
<script src = "js/lib/jquery/jqueryui/jquery.ui.mouse.js"></script>
<script src = "js/lib/jquery/jqueryui/jquery.ui.button.js"></script>
<script src = "js/lib/jquery/jqueryui/jquery.ui.draggable.js"></script>
<script src = "js/lib/jquery/jqueryui/jquery.ui.position.js"></script>
<script src = "js/lib/jquery/jqueryui/jquery.ui.dialog.js"></script>
<script src = "js/lib/FileSaver.js"></script>
<script src = "js/lib/spectrum.js"></script>
<script src = "js/mainapp.js"></script>
</body>
</html>