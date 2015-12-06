require(['jquery'], function($){
	
	var App = (function(){
		
		function loadComplete(resp, st, xhr){
			console.log(resp);
		}

		function loadError(resp, st, xhr){
			console.log('error');
		}

		return {
			init: function(){
				var callistoTag = $('script[data-callisto-id]'),
					url = 'http://localhost:8080/site/';

				if(callistoTag.length > 0){
					$(callistoTag).each(function(i, ct){
						$.get(url+$(ct).attr('data-callisto-id')).
							done(loadComplete).
							error(loadError);
					});
				}
			}
		};

	})();

	$(App.init);

	return App;
});
