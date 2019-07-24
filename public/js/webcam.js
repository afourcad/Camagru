(function() {

	var streaming = false,
		video        = document.querySelector('#video'),
		cover        = document.querySelector('#cover'),
		canvas       = document.querySelector('#canvas'),
		photo        = document.querySelector('#photo'),
		startbutton  = document.querySelector('#startbutton'),
		saveButton	 = document.querySelector('#saveButton'),
		canvasFilter = document.getElementById('canvas_filters'),
		canvasURL,
		canvasURL2,
		width = 400,
		height = 0;

	navigator.getMedia = ( navigator.getUserMedia ||
						   navigator.webkitGetUserMedia ||
						   navigator.mozGetUserMedia ||
						   navigator.msGetUserMedia);

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
	  canvas.getContext('2d').drawImage(canvasFilter, 0, 0, width, height);
	  var data = canvas.toDataURL('image/png');
	  canvas.setAttribute('src', data);
	}

	startbutton.addEventListener('click', function(ev){
		if(startbutton.innerHTML == "Click"){
			canvasFilter.style.display = "none";
			video.style.display = "none";
			startbutton.innerHTML = "Reset";
			saveButton.style.display = "block";
			takepicture();
		}
		else if(startbutton.innerHTML == "Reset"){
			canvasFilter.style.display = "block";
			video.style.display = "block";
			startbutton.innerHTML = "Click";
			saveButton.style.display = "none";
		}
	  ev.preventDefault();
	}, false);

	saveButton.addEventListener('click', function(){
		canvasURL = canvas.toDataURL('image/png');
		document.getElementById('hidden_data').value = canvasURL;
		canvasURL2 = canvasFilter.toDataURL('image/png');
		document.getElementById('hidden_data2').value = canvasURL2;
		var fd = new FormData(document.forms["form1"]);
		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'view/front/upload_data.php', true);
		xhr.send(fd);
			canvasFilter.style.display = "block";
			video.style.display = "block";
			startbutton.innerHTML = "Click";
			saveButton.style.display = "none"
	})

	window.onload = function() {
		var ctx = canvasFilter.getContext("2d");
			var img = new Image();
		img.onload = function () {
			ctx.drawImage(img, 0, 0, 400, 300);
		}
		img.src = "data/filters/chapeau.png";
	}


})();

function changeFilters(filter){
	var ctx = document.getElementById('canvas_filters').getContext("2d");
		var img = new Image();
	img.onload = function () {
		ctx.clearRect(0, 0, 400, 300);
		ctx.drawImage(img, 0, 0, 400, 300);
	}
	img.src = "data/filters/" + filter + ".png";
};
