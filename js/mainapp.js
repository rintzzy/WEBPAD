// Main JS file for WebPad : a rich text editor for web
// Author : Somnath Mukherjee
// Contact me : somnathbm0@gmail.com
 
(function(){
    	
//To enable editablity of iframe
$(function(){
  frames["editr"].document.designMode = "on";
}); 

//Spectrum color plugin use
$("#color, #bgcolor, #selLineColor, #shadowColor").spectrum({
	preferredFormat: "hsl",
	showInput: true
});
//Align left
$("#left_align").click(function(){
   if($("#editr").contents().find("div").css("float") == "right" || $("#editr").contents().find("div").css("position") == "absolute"){
     $("#editr").contents().find("div").css("position","relative").css("left","").css("right","").css("float","left");
	}	
   frames["editr"].document.execCommand("formatblock",false,"div");	
   $("#editr").contents().find("div").css("text-align","left");
}); 
//Align right
$("#ri8_align").click(function(){
   if($("#editr").contents().find("div").css("float") == "left" ||
      $("#editr").contents().find("div").css("position") == "absolute"){
        $("#editr").contents().find("div").css("position","relative").css("left","").css("right","").css("float","right");
	}
   frames["editr"].document.execCommand("formatblock",false,"div");	
   $("#editr").contents().find("div").css("text-align","right");
});
//Align center
$("#cntr_align").click(function(){
     if($("#editr").contents().find("div").css("float") == "left" || $("#editr").contents().find("div").css("display") == "inline-block"){
	    var width = $("#editr").contents().find("div").css("width").split("p"),
		    center = parseInt((305+width[0]/2)-width[0]).toString() + "px";
        $("#editr").contents().find("div").css("position","absolute").css("left",center);
	 }
	 else if($("#editr").contents().find("div").css("float") == "right"){
	    var width = $("#editr").contents().find("div").css("width").split("p"),
		    center = parseInt((305+width[0]/2)-width[0]).toString() + "px";
			console.log(center);
        $("#editr").contents().find("div").css("position","absolute").css("right",center);
     }	
	frames["editr"].document.execCommand("formatblock",false,"div");	
   $("#editr").contents().find("div").css("text-align","center");	
});
//font-family selection
$("#fname").change(function(){
  for(var i = 1,len = this.options.length;i<=len;i++){
    if(this.options[i].selected){
	    var fopt = this.options[i].value;
		frames["editr"].document.execCommand("fontname",false,fopt);
	}
  }
});
//font-size selection
$("#fsize").change(function(){
  for(var i = 1,len = this.options.length;i<=len;i++){
    if(this.options[i].selected){
        var fsopt = this.options[i].value;
        frames["editr"].document.execCommand("fontsize",false,fsopt);
    }
  }
});  
//bold selection
$("#bold").click(function(){
  frames["editr"].document.execCommand("bold",false,null);
 });
//italic selection
$("#italic").click(function(){
  frames["editr"].document.execCommand("italic",false,null);
 }); 
//jQuery UI Dialog initialization
$("#s").removeClass("ui-corner-all");
  $("#underline,#shadow,#rotation,#skew,#translation").dialog({
    autoOpen: false,
	width: 420,
	modal: true
 });	
//Underline options
$("#u").button().click(function(){
  var lineStyle,lineColor;
  $("#underline").dialog("open");
  frames["editr"].document.execCommand("formatblock",false,"div");
  $("#selLineStyle").change(function(){
    for(var i = 1,len = this.options.length;i<=len;i++){
       if(this.options[i].selected){
	      lineStyle = this.options[i].value;
	   }
    }
   });
  $("#selLineColor").change(function(){
    lineColor = $(this).val();
    });	
  $("#doApplyLine").click(function(){
    var ua = navigator.userAgent;
	if(/Chrome/.test(ua)){  
      $("#editr").contents().find("div").css("text-decoration-line","underline").css("text-decoration-style",lineStyle)
	  .css("text-decoration-color",lineColor); //won't render correctly. Bug '342126','347091'
	}
	else if(/Firefox/.test(ua)){
	  $("#editr").contents().find("div").css({"-moz-text-decoration-line":underline, "-moz-text-decoration-style":lineStyle, "-moz-text-decoration-color",lineColor}); 
	  $("#underl9Form")[0].reset();
	}  
    $("#underline").dialog("close");
  });
});  
//Shadow options 
$("#s").button().click(function(){
  var unitX = "px",unitY = "px",unitBlur = "px",ua = navigator.userAgent;
  $("#shadow").dialog("open");
  frames["editr"].document.execCommand("formatblock",false,"div");
  $("#unitOffsetX").change(function(){
    for(var i = 1,len = this.options.length;i<=len;i++){
       if(this.options[i].selected){
	      unitX = this.options[i].value;
	   }
    }
  });
  $("#unitOffsetY").change(function(){
    for(var i = 1,len = this.options.length;i<=len;i++){
       if(this.options[i].selected){
	      unitY = this.options[i].value;
	   }
    }
  });
  $("#unitBlur").change(function(){
    for(var i = 1,len = this.options.length;i<=len;i++){
      if(this.options[i].selected){
	      unitBlur = this.options[i].value;
	  }
    }
  });
  $("#doApply").click(function(){
                            var x = $("input[name='shadowx']").val(),
                                y = $("input[name='shadowy']").val(),
                                blur = $("input[name='shadowblur']").val(),
                                clr = $("input[name='shadowcolor']").val(),
                                shadowValue = x + unitX + " " + y + unitY + " " + blur + unitBlur + " " + clr;
	                        $("#editr").contents().find("div").css("text-shadow",shadowValue);
							$("#shadowform")[0].reset();  
	                        $("#shadow").dialog("close");
                        });
							
 });  
//Link options
$("#l").click(function(){
  var url = prompt("What link do you want to hypertext?","");
  frames["editr"].document.execCommand("createlink",false,url);
});  
//Rotation function
$("#rotate").button().click(function(){
  $("#rotation").dialog("open");
  frames["editr"].document.execCommand("formatblock",false,"div");
  $("#doRotate").click(function(){
    var tx = $("#rotateVal").val(),
	    rx = "rotate(" + tx + "deg" + ")";
    $("#editr").contents().find("div").css("display","inline-block").css("transform",rx);
	$("#rotation").dialog("close");
  });
});
//Skew function
$("#skewy").button().click(function(){
   $("#skew").dialog("open");
   frames["editr"].document.execCommand("formatblock",false,"div");
  $("#doSkew").click(function(){
    var tx = $("input[name='skew']").val();
	var rx = tx + "deg";
	
    $("#editr").contents().find("div").css("transform","skew(" + rx + ")");
	console.log(rx);
	$("#skew").dialog("close");
  });
}); 
//Translate function
$("#translate").button().click(function(){
  var unitX = "px",unitY = "px";
  $("#translation").dialog("open");
  frames["editr"].document.execCommand("formatblock",false,"div");
  
  $("#trunitOffsetX").change(function(){
    for(var i = 1,len = this.options.length;i<=len;i++){
       if(this.options[i].selected){
	      unitX = this.options[i].value;
	   }
    }
  });
  $("#trunitOffsetY").change(function(){
    for(var i = 1,len = this.options.length;i<=len;i++){
       if(this.options[i].selected){
	      unitY = this.options[i].value;
	   }
    }
  });
  
  $("#doTranslate").click(function(){
                            var x = $("input[name='transx']").val(),
                                y = $("input[name='transy']").val(),
                                translateValue = "translate(" + x + unitX + "," + y + unitY + ")";
	                        $("#editr").contents().find("div").css("transform",translateValue);
	                        $("#translation").dialog("close");
                        });							
 });  
//Image Insert functions here
  $("#insert_img").click(function(){
    var url = prompt("Type the full file path for your file",""),
	    fullURL = "file:///" + url;
   frames["editr"].document.execCommand("insertimage",false,fullURL); 
});  
//Ruler insert functions here
$("#insert_ruler").click(function(){
  frames["editr"].document.execCommand("inserthorizontalrule",false,null);
});  
//Unordered List options
$("#insert_list").click(function(){
  frames["editr"].document.execCommand("insertunorderedlist",false,null);
});  
//listener for font color swatch	
$("#color").change(function(){	
  var color = $(this).val();
  frames["editr"].document.execCommand("forecolor",false,color);
}); 
//listener for background-color swatch
$("#bgcolor").change(function(){
  frames["editr"].document.execCommand("formatblock",false,"div");
  var bgcolor = $(this).val();
  $("#editr").contents().find("div").css("width","auto").css("display","inline-block").css("background-color",bgcolor);
});
//Info options
$("#info").click(function(){
   $(".osk_wrapper").toggleClass("rotate-plus");
   $("#editr").toggleClass("leaderboard");
 });

/* ---------------------------------------------------------------------------------------------------------
   file save utility portion starts from here..
   Involves W3C's saveAs() API, but made cross-browser and implemented as : FileSaver.js
   By Eli Grey
------------------------------------------------------------------------------------------------------------ */
(function(view) { //wrapped in an immediate executing function on its own
"use strict";
var
	  document = view.document
	, $$ = function(id) { //i've used a seperate selector alias to prevent conflicts with jQuery's $() 
		return document.getElementById(id);
	}
	// only get URL when necessary in case Blob.js hasn't defined it yet
	, get_blob = function() {
		return view.Blob;
	}

	, html = $$("editr").contentDocument.body //getting reference to the body of the document that the iframe contains
	, html_options_form = $$("export_form")

	// Title guesser and document creator available at https://gist.github.com/1059648
	, guess_title = function(doc) {
		var
			  h = "h6 h5 h4 h3 h2 h1".split(" ")
			, i = h.length
			, headers
			, header_text
		;
		while (i--) {
			headers = doc.getElementsByTagName(h[i]);
			for (var j = 0, len = headers.length; j < len; j++) {
				header_text = headers[j].textContent.trim();
				if (header_text) {
					return header_text;
				}
			}
		}
	}
	, doc_impl = document.implementation
	, create_html_doc = function(html) { //this function creates a html document dynamically w/ contents from iframe being edited
		var
			  dt = doc_impl.createDocumentType('html', null, null)
			, doc = doc_impl.createDocument("http://www.w3.org/1999/xhtml", "html", dt)
			, doc_el = doc.documentElement
			, head = doc_el.appendChild(doc.createElement("head"))
			, charset_meta = head.appendChild(doc.createElement("meta"))
			, title = head.appendChild(doc.createElement("title"))
			, body = doc_el.appendChild(doc.createElement("body"))
			, i = 0
			, len = html.childNodes.length
		;
		charset_meta.setAttribute("charset", html.ownerDocument.characterSet);
		for (; i < len; i++) {
			body.appendChild(doc.importNode(html.childNodes.item(i), true));
		}
		var title_text = guess_title(doc);
		if (title_text) {
			title.appendChild(doc.createTextNode(title_text));
		}
		return doc;
	}
;

html_options_form.addEventListener("submit", function(event) { //listener on 'save' button of the app
	event.preventDefault();
	var
		  BB = get_blob()
		, xml_serializer = new XMLSerializer()
		, doc = create_html_doc(html)
		, fname = prompt("What name be the file will?",""); //getting the filename from the user

	;
	saveAs(
		  new BB(
			  [xml_serializer.serializeToString(doc)]
			, {type: "application/xhtml+xml;charset=" + document.characterSet}
		)
		, (fname) + ".html" //only save as HTML
	);
}, false);  
}(self));
/* file save mechanism ends here
----------------------------------------------------------------------------------------------- */
 
})(); // ends the main function