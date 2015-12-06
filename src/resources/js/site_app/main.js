require(['jquery'], function($){
	
	var App = (function(){
		
		function loadComplete(resp, st, xhr){
			if(resp.hasOwnProperty('ads') && resp.ads){
				var ad,
					adElement;
				for(var i = 0; i < resp.ads.length; i++){
					ad = resp.ads[i];
					adElement = $('#cal'+ad.site_id+'-'+ad.id);
					if(adElement.length > 0){
						adElement.html(ad.code);
					}
				}
			}
		}

		function loadError(resp, st, xhr){
			console.log('error', resp, st, xhr);
		}

		return {
			init: function(){
				var callistoTag = $('script[data-callisto-id]'),
					data;

				if(callistoTag.length > 0){
					$(callistoTag).each(function(i, ct){
						data = {
							site: $(ct).attr('data-callisto-id')
						};

						$.post('http://localhost:8080/site', data).
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
