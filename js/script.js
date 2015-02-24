$(document).ready(function(){
	
	/*
	var tmp = "abcdefg";
	alert(tmp.split(/(b)(c)/));
	
	var str = "1 + 3 * 5 * 5 - 8";
	
	
	
	var tmp = str;
	
	console.log(str);
	
	while(!/^\d+$/.test(str))
	{
		str = str.replace(/ +/g, " ");
		console.log(str);
//		console.log(/\*|\//.test(str));
		if(/\*|\//.test(str))
			str = str.split(/(\d+) *(\*|\/) *(\d+)/g);
		else
			str = str.split(/(\d+) *(\+|-) *(\d+)/g);
			
//		console.log(JSON.stringify(str));
		var val = 0;
		var left = "";
		var right = "";
		var o = "";
		$.each(str, function(i,e){

			if(/^\d+$/.test(e))
			{	
				if(left == "")
					left = e;
				else
					right = e;
			}

			if(/^[-\+\*\\]$/.test(e))
			{
				o = e;
			}

			if(right != "")
			{
				str = (str[0] + " ") + doOperation(left, right, o) + (" " + str[str.length - 1]);
				left="";
				right="";
				o="";
			}

		});

//		alert(str);
//		console.log(str);
		
	}
	*/
	
	$("[data-role='dialog']").each(function(i,e){
		
		$settings = $(e).children(":first-child");
		
		$button = $("<span class='btn'></span>");
		
		$button.attr("onclick", "windowManager.showDialog('#"+$(e).attr("id")+"')");
		$button.html($settings.attr("title"));
		$(".container").append($button);
		
		$(e).attr("data-title", $settings.attr("title"));
		
		$settings.remove();
	});
	
});

function doOperation(val, nxt, operation)
{
	
	
	val = parseFloat(val);
	nxt = parseFloat(nxt);
	
	var original = val;
	
	switch(operation)
	{
		case "*":
			if(val == 0)
				val = nxt;
			else	
				val *= nxt;
			break;
		case "/":
			val /= nxt;
			break;
			
		case "-":
			console.log("subtracting");
			val -= nxt;
			break;
			
		case "+":
			console.log("adding");
			val += nxt;
			break;
	}
	
	return val;
}


var windowManager = {
	
	showDialog: function(target){
		
		target = $(target);
		
		$(target)
		  .dialog({
			"width" : "auto",
			"height" : "auto",
			"title" : target.attr("data-title"),
			"buttons" : { 
				"Ok" : function(){ $(this).dialog("close"); },
				 }
			})
		  .dialogExtend({
			"closable" : true,
			"maximizable" : true,
			"minimizable" : true,
			"collapsable" : false,
			"dblclick" : "minimize",
			"titlebar" : "transparent",
			"minimizeLocation" : "left",
			"icons" : {
			  "close" : "glyphicon glyphicon-remove",
			  "maximize" : "glyphicon glyphicon-plus",
			  "minimize" : "glyphicon glyphicon-minus",
			  "collapse" : "glyphicon glyphicon-remove",
			  "restore" : "glyphicon glyphicon-resize-small"
			},
	//        "load" : function(evt, dlg){ alert(evt.type); },
			"beforeCollapse" : function(evt, dlg){ 
				turnTransition(this, true);
			},
			"beforeMaximize" : function(evt, dlg){ 
	//			alert(evt.type); 
	//			$(dlg).css("transition", "0.5s");
				turnTransition(this, true);
				var dialog = $(this).parents(".ui-dialog");
				dialog.attr("style", dialog.attr("data-css"));
			},
			"beforeMinimize" : function(evt, dlg){ 
				turnTransition(this, true);

				var aria = $(this).parents(".ui-dialog").attr("aria-describedby");
				var dialog = $(this).parents(".ui-dialog");
				setTimeout(function(){
					dialog.attr("data-css", dialog.attr("style"));

					$proxy = $("#dialog-extend-fixed-container [aria-describedby='"+aria+"']");

					$(dialog).css({
						left: $proxy.offset().left + "px",
						top: $proxy.offset().top + "px",
						width: $proxy.outerWidth() + "px",
						height: $proxy.outerHeight() + "px",
						display: "block",
						transition: "0.5s",
					});
				},0);

			},
			"beforeRestore" : function(evt, dlg){ 
				turnTransition(this, true);
			},
			"collapse" : function(evt, dlg){
				turnTransition(this, false);
			},
			"maximize" : function(evt, dlg){ 
				turnTransition(this, false);
			},
			"minimize" : function(evt, dlg){ 
	//			turnTransition(this, false);

				var dialog = $(this).parents(".ui-dialog");
				$proxy = $("#dialog-extend-fixed-container [aria-describedby='"+dialog.attr("aria-describedby")+"']");

				$proxy.css({
					opacity: "0",
				});

				dialog.css({
					display: "block",
					opacity: "0.5s"
				});

				setTimeout(function(){
					$proxy.css("opacity", "1");
					dialog.css("opacity", "0");
				}, 500);
			},
			"restore" : function(evt, dlg){ 
	//			turnTransition(this, false);
				var dialog = $(this).parents(".ui-dialog");
				if(dialog.attr("data-css") != undefined)
				{
					dialog.attr("style", dialog.attr("data-css"));
					dialog.removeAttr("data-css");
				}
				setTimeout(function(){
					dialog.css("transition", "0s");
				},500);
			}
		  });
		
		
		$(target).dialogExtend("restore");
		utilities.animate($(target).parents(".ui-dialog"), "bounceIn");
	}
	
};


$(function(){
  $("#my-button").click(function(){
    
  });
});

function turnTransition(sender, on)
{
	on = on ? "0.3s" : "0s";
	$(sender).parents(".ui-dialog").css("transition", on);
}