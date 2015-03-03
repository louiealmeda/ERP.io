var config = {
	initialize: function(){
		config.coreUrl = $("body[data-core-url]").attr("data-core-url");
	},
	coreUrl : null
	
}

var com = {
	
	logRequests: true,
	isPrototyping: false,
	simulatedTimeDelay: 500,
	post: function(url, params, callback, prototypingValue){
		
		prototypingValue = prototypingValue || '{"Code":"00", "Message":"This is a default prototyping value."}';
		
		if(com.logRequests)
		{
			if(com.isPrototyping)
				console.log("Simulating post to: " + url);
			else
				console.log(":" + config.coreUrl + url + " :: " +JSON.stringify(params));
		}

		if(!com.isPrototyping)
		{
			$.post(config.coreUrl + url, params, function(data){
				if(com.logRequests)
					console.log("Received from "+ url+": " + data);

				data = JSON.parse(data);
				callback(data);
			});
		}
		else{
			
			setTimeout(function(){
				if(com.logRequests)
					console.log("Simulated value from "+ url+": " + data);
				
				if(typeof prototypingValue == "string")
					prototypingValue = JSON.parse(prototypingValue);
				
				callback(prototypingValue);
			}, com.simulatedTimeDelay);
			
		}
		
	},
	bindSource : function(table, data, columns, flex){
		table = $(table);
		
		table.html("<thead><tr></tr></thead><tbody></tbody>");
		
		if(table.parents(".flexigrid").length > 0)
		{
			table.parents(".flexigrid").replaceWith(table);
			
		}
		
		flex = flex == undefined ? false : flex;
		
//		table.find("thead tr").html("");
//		table.find("tbody").html("");
		
		
		$.each(columns, function(i, column){
			table.find("thead tr").append($("<th>"+column+"</th>"));
		});
		
		$.each(data,function(row,e){
			
			var tr = $("<tr>");
			
			$.each(columns, function(i, column){
				tr.append("<td>"+e[column]+"</td>");
			});
			
			
			table.find("tbody").append(tr);
		});
		
		if(flex){
//			alert(table.html());	
			table.flexigrid();
		}
	}
}

$(document).ready(function(){
	
	config.initialize();
	
	windowManager.initialize();

//	com.isPrototyping = true;
	
	
});

var modules = {
	
};

var windowManager = {
	callEvent: function(index, method){
		
		index = typeof index == "object" ? $(index).attr("data-index") : index;
		
		if(typeof modules[index] != "undefined" &&
			  typeof modules[index][method] != "undefined")
			return modules[index][method]();
						
		return true;
	},
	initialize: function(){
		
		$container = $(".container.nav");
		
		$("[data-role='dialog']").each(function(i,e){
		
			$settings = $(e).children(":first-child");

			$button = $("<li><a href='#'></a></li>");
			
			var onclick = "windowManager.showDialog('#"+$(e).attr("id")+"')";
			
			

			
			if($settings.attr("caller") != undefined)
			{
				var ids = $settings.attr("caller").split(" ");
				
				$.each(ids, function(i,e){
					$("#" + e).attr("onclick", onclick);
				});
				
			}
			
			if($settings.attr("parent") != undefined)
			{
				
				$button.attr("onclick", onclick);
			
				var title = $settings.attr("title");
				$button.children().html(title);
				$container.append($button);
				
				var parent = $settings.attr("parent");
				if($container.find("[data-module='"+parent+"']").length != 0)
				{
					$module = $container.find("[data-module='"+parent+"']");

					$module.append($button);
				}
				else{

					$module = $('<li class="dropdown"></li>');
					$module.html('<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'+parent+'</span></a>');
					$module.append('<ul class="dropdown-menu" role="menu" data-module="'+parent+'"><li>');
					$module.attr("onmouseover", "$(this).attr('aria-expanded', 'true').addClass('open')");
					$module.attr("onmouseout", "$(this).attr('aria-expanded', 'false').removeClass('open')");	
					$module.find("ul").append($button);
					$container.append($module);
				}
			}
				
			$(e).attr("data-title", $settings.attr("title"));

//			alert($settings.wrap("div").parent().html());
			
			if($settings.attr("closable") != undefined)
				$(e).prop("closable", true);
			
			if($settings.attr("minimizable") != undefined)
				$(e).prop("minimizable", true);
			
			if($settings.attr("maximizable") != undefined)
				$(e).prop("maximizable", true);
			
			if($settings.attr("resizable") != undefined)
				$(e).prop("resizable", true);
			if($settings.attr("modal") != undefined)
				$(e).prop("modal", true);
			
			$settings.remove();
		});
	},	
	showDialog: function(target){
		target = $(target);
		$(target)
			.dialog({
				"resizable": $(target).prop("resizable") != undefined,
				"modal": $(target).prop("modal") != undefined,
				"width" : "auto",
				"height" : "auto",
				"title" : target.attr("data-title"),
				"buttons" : { 
					"Ok" : function(){ $(this).dialog("close"); },
				},
				beforeClose: function(){
					
					return windowManager.callEvent(target, "onClose");
					
				},
				open: function(){
					return windowManager.callEvent(target, "onOpen");
				},
				create: function( event, ui ) {
					var buttons = target.children(".buttons");
					
					windowManager.callEvent(target, "onLoad");	
//					target.parent().find(".ui-button-text").removeClass("ui-button-text").addClass("btn");
					if(buttons.length != 0)
					{
						target.parent().find(".ui-dialog-buttonset").html(buttons.html());
						buttons.remove();
					}
				}
			})
			.dialogExtend({
				"closable" : $(target).prop("closable") != undefined,
				"maximizable" : $(target).prop("maximizable") != undefined,
				"minimizable" : $(target).prop("minimizable") != undefined,
				"collapsable" : false,
				"dblclick" : $(target).prop("minimizable") != undefined ? "minimize" : "",
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
					return windowManager.callEvent(target, "onCollapse");
				},
				"beforeMaximize" : function(evt, dlg){ 
					turnTransition(this, true);
					var dialog = $(this).parents(".ui-dialog");
					dialog.attr("style", dialog.attr("data-css"));
					windowManager.callEvent(target, "onMaximize");
				},
				"beforeMinimize" : function(evt, dlg){ 
					turnTransition(this, true);

					var aria = $(this).parents(".ui-dialog").attr("aria-describedby");
					var dialog = $(this).parents(".ui-dialog");
					setTimeout(function(){
						dialog.attr("data-css", dialog.attr("style"));

						$proxy = $("#dialog-extend-fixed-container [aria-describedby='"+aria+"']");
						windowManager.callEvent(target, "onMinimize");
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
					windowManager.callEvent(target, "onRestore");
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