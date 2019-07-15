(function() {

	var streaming = false,
		video        = document.querySelector('#video'),
		cover        = document.querySelector('#cover'),
		canvas       = document.querySelector('#canvas'),
		photo        = document.querySelector('#photo'),
		startbutton  = document.querySelector('#startbutton'),
		canvasFilter = document.getElementById('canvas_filters'),
		width = 400,
		height = 0;

	navigator.getMedia = ( navigator.getUserMedia ||
						   navigator.webkitGetUserMedia ||
						   navigator.mozGetUserMedia ||
						   navigator.msGetUserMedia);

	// canvasFilter.style.display = "none";
	// canvas.style.display = "none";

	navigator.getMedia(
	  {
		video: true,
		audio: false
	  },
	  function(stream) {
		if (navigator.mozGetUserMedia) {
		  video.mozSrcObject = stream;
		} else {
		  video.srcObject = stream;
		}
		video.play();
	  },
	  function(err) {
		console.log("An error occured! " + err);
	  }
	);

	video.addEventListener('canplay', function(ev){
	  if (!streaming) {
		height = video.videoHeight / (video.videoWidth/width);
		video.setAttribute('width', width);
		video.setAttribute('height', height);
		canvas.setAttribute('width', width);
		canvas.setAttribute('height', height);
		streaming = true;
	  }
	}, false);

	function takepicture() {
	  canvas.width = width;
	  canvas.height = height;
	  canvas.getContext('2d').drawImage(video, 0, 0, width, height);
	  var data = canvas.toDataURL('image/png');
	  photo.setAttribute('src', data);
	}

	startbutton.addEventListener('click', function(ev){
		if(startbutton.innerHTML == "Click"){
			canvasFilter.style.display = "none";
			video.style.display = "none";
			startbutton.innerHTML = "Reset";
			takepicture();
		}
		else if(startbutton.innerHTML == "Reset"){
			canvasFilter.style.display = "block";
			video.style.display = "block";
			startbutton.innerHTML = "Click";
		}
	  ev.preventDefault();
	}, false);

	})();
