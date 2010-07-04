function init() {
	tinyMCEPopup.resizeToInnerSize();
}

function inserthtml5video() {
	
	var tagtext = "";
	
	var audio = document.getElementById('audio_panel');
	var video = document.getElementById('video_panel');
	
	// who is active ?

	if (audio.className.indexOf('current') != -1) {
		var shorttag = "audio";
		var audio_url = document.getElementById('audio_url').value;		

		if(shorttag == "" || audio_url == "") {
			alert("ID or Site not specified");
		} else {
			tagtext = "[" + shorttag + " src=\"" + audio_url + "\"";			
			tagtext += "]";
		}
	}

	if (video.className.indexOf('current') != -1) {
		var shorttag = "video";
		var video_url = document.getElementById('video_url').value;	
		var auto_width = parseInt(document.getElementById('auto_width').value);
		var auto_height = parseInt(document.getElementById('auto_height').value);
		var video_poster = document.getElementById('video_poster').value;

		if(video_url == "" || shorttag == "") {
			alert("ID or Site not specified");
		} else {
			tagtext = "[" + shorttag + " src=\"" + video_url + "\"";
			if (auto_width > 0) {
				tagtext += (" width=\"" + auto_width + "\"");
			}
			if (auto_height > 0) {
				tagtext += (" height=\"" + auto_height + "\"");
			}
			if (video_poster != "") {
				tagtext += (" poster=\"" + video_poster + "\"");
			}
			tagtext += "]";
		}
	}
	


	if(tagtext != "" && window.tinyMCE) {
		//TODO: For QTranslate we should use here 'qtrans_textarea_content' instead 'content'
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
		//Repaints the editor. Sometimes the browser has graphic glitches. 
		//tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;
}
