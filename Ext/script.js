var numer = document.getElementById("n");
var oldval = numer.value
numer.value = 666666

/*s
var a = [];

 chrome.storage.local.set({'storagekey': a}, function() {
          // Notify that we saved.	
        });
 */

chrome.storage.local.get(["storagekey"], function(result) {
        var array = result.storagekey?result.storagekey:[];

        array.unshift(oldval);

        var jsonObj = {};
        jsonObj.storagekey = array;
        chrome.storage.local.set(jsonObj, function() {
            console.log("Saved a new array item");
        });
    });





