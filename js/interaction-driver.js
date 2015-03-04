jQuery.fn.extend({
	htmlWithTrigger: function(html) {
		return this.each(function() {
			$(this).html(html);
			$(document).trigger("contentchange");
		});
	},
	appendWithTriger: function(html) {
		return this.each(function() {
			$(this).append(html);
			$(document).trigger("contentchange");
		});
	},
	removeWithAnimation:function(animation) {
		return this.each(function() {
			$(this).addClass("animated " + animation);
			var duration = parseFloat($(this).css("animation-duration").replace("s", ""));
			var delay = parseFloat($(this).css("animation-delay").replace("s", ""));
			
			setTimeout(function(){
				$(this).remove();
			}, (duration+delay) * 1000);
			
		});
	},
	giveFocus: function(animation) {
		return this.each(function() {
			utilities.animate(this,animation);
			$(this).trigger("focus");
		});
	},
	startLoading: function(params)
	{
		params = params || {};
		defaults = {
			bg : "transparent",
			color : "#999",
			text : "loading...",
			effect: "stretch"
		};
		
		params = utilities.mergeArray(defaults,params);
//		alert(JSON.stringify(params));
		return this.each(function() {
			$(this).waitMe({
				effect : params.effect,
				text : params.text,
				bg : params.bg,
				color : params.color,
				sizeW : '',
				sizeH : ''
			});
		});
	},
	stopLoading:function(){
		return this.each(function() {
			$(this).waitMe("hide");
		});
	},
	appendAttr:function(attr, value){
		return this.each(function() {
			if($(this).attr(attr) != undefined)
				$(this).attr(attr, $(this).attr(attr) + value);
			else
				$(this).attr(attr, value);
		});
	},
	outerHtml:function(){
		return $(this[0]).wrap("<div>").parent().html();
	}
	
	
});