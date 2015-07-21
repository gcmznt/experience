// https://github.com/h5bp/html5-boilerplate/issues/1444

ga('create','UA-XXXXX-X',{'storage': 'none','clientId':localStorage.getItem('gaClientId')});
ga(function(t){localStorage.setItem('gaClientId',t.get('clientId'));});
ga('send','pageview');
