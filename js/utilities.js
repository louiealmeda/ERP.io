var utilities = {
	currentSize: "xs",
	keys: {
		ENTER : 13,
		DEL : 46,
		HOME : 36,
		END : 35,
		PGUP : 33,
		PGDOWN : 34,
		ARROWLEFT : 37,
		ARROWUP : 38,
		ARROWRIGHT : 39,
		ARROWDOWN : 40,
		CAPSLOCK : 20,
		TAB : 9,
		PERIOD : 190,
		BKSPC : 8,
		SPACE : 32,
		ESCAPE: 27
	},
	dismissAllPopovers: function(){
		console.log("Dismissing popovers");
		$(".popover").remove();	
	},
	clickFocus: {
		addTarget: function(target, callback, requireActive){
			requireActive = requireActive || false;
			utilities.clickFocus.targets[utilities.clickFocus.targets.length] = {object: target, callback: callback, requireActive: requireActive};
		},
		removeTaget:function(target)
		{
			var targets = utilities.clickFocus.targets;
			
			for(var i = 0; i < targets.length; i++)
			{
				if(targets[i].object == target)
				{
					utilities.clickFocus.targets.splice(i,1);
				}
			}	
		},
		targets: [],
		bind : function(){
			$("body>.wrapper").on("mousedown", function(event){
				utilities.clickFocus.targets.forEach(function(e,i){
					
					if( ($(e.object).hasClass("active") || !e.requireActive) &&  $(event.target) !== $(e.object) && $(event.target).parents(e.object).length == 0) {
//						$(e).removeClass("active");
						e.callback();
					}
				});
			});
		}
	},
	hooks: {
		bind: function(target){
			if(!$(target).attr("onkeyup"))
				$(target).attr("onkeyup", "");
			
			$(target).attr("onkeyup", $(target).attr("onkeyup") + " utilities.hooks.keyPress();" );	
		},
		keyPress: function()
		{
			utilities.hooks.targets.forEach(function(e,i){
				if(event.which == e.key)
					e.callback();
			});
		},
		targets: [],
		add: function(callback, key){
			utilities.hooks.targets[utilities.hooks.targets.length] = {callback: callback, key: key};
		}
	},
	automateAccordionTargeting: function(){

		$("[role=tablist]>.panel [data-toggle=collapse]").each(function(i,e){
			$(e).attr("href", "[data-collapse-id=" + i + "]");
			$(e).closest(".panel").children("[role=tabpanel]").attr("data-collapse-id", i);
			
		});
	},
	cascade: function(sender){
		alert("Cascade not implemeted yet");
	},
	getTotalAnimationDuration: function(selector)
	{
		var waitingTime = 0;
		$(selector).each(function(i,e){
			$(e).removeClass($(e).attr("data-in"));
			$(e).addClass($(e).attr("data-out"));

			var delay = parseFloat($(e).attr("data-delay")) || 0;
			var duration = parseFloat($(e).attr("data-duration")) || 0;

			if( waitingTime < delay + duration )
				waitingTime = delay + duration;

		});
		return waitingTime * 1000 + 500;
	},
	
	trackScreenSize: function(sizes){
		sizes = sizes || [0,450, 768, 992, 1200];
		label = ["ss","xs", "sm", "md", "lg"];
		$(window).on('load resize', function(){
			var largest = 0;
			var width = $(window).width();
			sizes.forEach(function(e,i){

				if( width > e)
					largest = i;
			});

			$('html').attr('class', function(i, c){
				return c.replace(/(^|\s)screen-\S+/g, '');
			});

			$('html').addClass("screen-" + label[largest]);
			utilities.currentSize = label[largest];
			utilities.updateStyle();

		});
	},
	updateStyle: function(){

		var attribute = "data-style-at-screen-"+utilities.currentSize;
		$("["+attribute+"]").each(function(i,e){
			$(e).attr("style", $(e).attr(attribute));	
		});
	},
	iterate: function(callback, repetitions,delay, onFinish)
	{
		var i = 0;
		onFinish = onFinish || function(){};
		var iterator = setInterval(function(){
			if(repetitions == i)
			{
				onFinish();
				clearTimeout(iterator);
				return;
			}
			callback(i);
			i++; 
		}, delay);
	},
	animate: function(target, animation, callback){
		callback = callback || function(element){};
		var manual = "";
		if(!$(target).hasClass("animated"))
			manual = " animated";
		
		$(target).addClass(animation + manual);
		
		setTimeout(function(){
			$(target).removeClass(animation + manual);
			callback(target);
		}, parseFloat($(target).attr("data-duration")) * 1000 || 1000) ;

	},
	mergeArray: function(a1, a2)
	{
		$.each(a2,function(key,value){
			a1[key] = value;
		});

		return a1;
	},
	preserveArray:function(a1,a2)
	{
		var derived = {};
		$.each(a2,function(index,key){
			derived[key] = a1[key];
		});

		return derived;
	},
	remove: function(sender)
	{
		$(sender).parent().remove();
	}
};