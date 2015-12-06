(function(){
	
	var scriptTags = document.getElementsByTagName('script'),
		tag,
		appendTag,
		loadUrl,
		initComplete = false;
	
	if(initComplete){
		return;
	}

	if(scriptTags.length > 0){
		for(var i = 0; i < scriptTags.length; i++){
			tag = scriptTags[i];
			siteId = tag.getAttribute('data-callisto-id');

			if(siteId){
				loadUrl = '//localhost:8080/site/'+siteId;
				appendTag = document.createElement('script');
				appendTag.setAttribute('type', 'text/javascript');
				appendTag.setAttribute('src', loadUrl);

				document.body.appendChild(appendTag);
			}
		}
	}

	initComplete = true;


})();
