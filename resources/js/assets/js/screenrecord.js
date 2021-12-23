if (typeof RecordRTC_Extension === "undefined") {
  alert("RecordRTC chrome extension is either disabled or not installed.");
}

// first step
var recorder = new RecordRTC_Extension();

var video = document.querySelector("video");

function stopRecordingCallback(blob) {
  console.log(blob);
  video.src = video.srcObject = null;
  video.src = URL.createObjectURL(blob);
  recorder = null;
  var token = "<?php echo(csrf_token()) ?>";
  let fd = new FormData();
  let file = new Blob([blob], { type: "video/webm" });
  fd.append("data", file);
  let form = new FormData();
  let request = new XMLHttpRequest();
  form.append("video-blob", file);
  form.append("_token", token);
  request.open("POST", "/admin/winner-video-store", true);
  request.send(form);
  console.log(request.response);
}

document.getElementById("btn-start-recording").onclick = function () {
  this.disabled = true;
  // you can find list-of-options here:
  // https://github.com/muaz-khan/Chrome-Extensions/tree/master/screen-recording#getsupoortedformats
  var options =
    recorder.getSupoortedFormats()[
      document.getElementById("RecordRTC_Extension_Options").value
    ];

  // second step
  recorder.startRecording(options, function () {
    document.getElementById("btn-stop-recording").disabled = false;
  });
};

document.getElementById("btn-stop-recording").onclick = function () {
  this.disabled = true;
  // third and last step
  recorder.stopRecording(stopRecordingCallback);
};
