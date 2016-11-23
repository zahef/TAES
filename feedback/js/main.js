
	var seconds = 1200,
    countDiv = document.getElementById('count'),
    secondPass,
    countDown = setInterval(function () {
      'use strict';
      secondPass();
    }, 1000);
function secondPass() {
  'use strict';
  var minutes = Math.floor(seconds / 60),
      remSeconds = seconds % 60;
  if (remSeconds < 10) {
    remSeconds = "0" + remSeconds;
  }
  countDiv.innerHTML = minutes + ":" + remSeconds;
  if (seconds > 0) {
    seconds = seconds - 1;
  } else {
    clearInterval(countDown);
    countDiv.innerHTML = "Done";
  }
}
