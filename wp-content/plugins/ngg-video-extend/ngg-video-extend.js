/**
 * 
 * ngg-video-extend.js - Simple replacement at it's finest ;)
 * 
 * rev: 1.4.2
 * date: 23/04/2011
 * 
 */

jQuery(document).ready(function($) {
  
  $(".ngg-gallery-thumbnail a").each(function (arr){
	var theText = $(this).attr("title");
	if(theText.indexOf("[nggvid]") > -1) {
		var theURL = theText.substring(theText.indexOf("[nggvid]") + 8, theText.indexOf("[/nggvid]"));
		var theReplacement = theText.replace("[nggvid]" + theURL + "[/nggvid]", "");
	
	    $(this).attr("href", theURL);
		$(this).attr("title", theReplacement);
		
		if($(this).attr("rel") != "") { 
			if($(this).attr("rel").charAt($(this).attr("rel").length) != ";") {
				$(this).attr("rel", $(this).attr("rel") + ";width=480;height=390");
			}
			else
			{
				$(this).attr("rel", $(this).attr("rel") + "width=480;height=390");
			}
		}
	}
  });
  
  $(".ngg-gallery-thumbnail span").each(function (arr){
	var theText = $(this).text();
	if(theText.search("[nggvid]") > -1) {
		var theURL = theText.substring(theText.indexOf("[nggvid]")+8, theText.indexOf("[/nggvid]"));
		var theReplacement = theText.replace("[nggvid]" + theURL + "[/nggvid]", "");
			
		$(this).text(theReplacement);
	}
  });
  
  $(".ngg-imagebrowser a").each(function (arr){
	var theText = $(this).attr("title");
	if(theText.indexOf("[nggvid]") > -1) {
		var theURL = theText.substring(theText.indexOf("[nggvid]") + 8, theText.indexOf("[/nggvid]"));
		var theReplacement = theText.replace("[nggvid]" + theURL + "[/nggvid]", "");
		
	    $(this).attr("href", theURL);		
		$(this).attr("title", theReplacement);
		
		if($(this).attr("rel") != "") { 
			if($(this).attr("rel").charAt($(this).attr("rel").length) != ";") {
				$(this).attr("rel", $(this).attr("rel") + ";width=480;height=390");
			}
			else
			{
				$(this).attr("rel", $(this).attr("rel") + "width=480;height=390");
			}
		}		
	}
  });
  
  $(".ngg-imagebrowser-desc p").each(function (arr){
	var theText = $(this).text();
	if(theText.search("[nggvid]") > -1) {
		var theURL = theText.substring(theText.indexOf("[nggvid]")+8, theText.indexOf("[/nggvid]"));
		var theReplacement = theText.replace("[nggvid]" + theURL + "[/nggvid]", "");
			
		$(this).text(theReplacement);
	}
  });
  
});