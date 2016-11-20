var numer = document.getElementById("n");
var oldval = numer.value
numer.value = 666666

 chrome.storage.local.set({'numer': oldval}, function() {
          // Notify that we saved.	
        });
