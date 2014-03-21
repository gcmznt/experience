    if ((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
        document.write("Apple");
    } else if (navigator.userAgent.match(/android/i)) {
        document.write("Android");
    } else {
        document.write("Altro");
    }



if(/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent))
