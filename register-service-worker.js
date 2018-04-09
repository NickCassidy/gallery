
			if ('serviceWorker' in navigator) 
				{
					console.log("Did the service worker register ok?");
  					window.addEventListener('load', function() 
  						{
    						navigator.serviceWorker.register('/service-worker.js').then(function(reg)
							{
        						console.log("Yes, it did");
      						})
      						.catch(function(err) 
      						{
        						console.log("No it didn't, this happened: ", err)
  							});
						})
				}