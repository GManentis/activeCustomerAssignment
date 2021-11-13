document.getElementById("setFiles").onclick = function(){
	var files = document.getElementById("numFiles").value;
	console.log(files);
	var arrayOfFiles = [];
	if(parseInt(files) && files > 0){
		arrayOfFiles = Array.from({length: files}, function(){ return "<input class='inputMargins' name='codeLinesPerFile[]'>";});
		console.log("Array Length",arrayOfFiles);
	}
	document.getElementById("fileInputs").innerHTML = `${arrayOfFiles.length > 0 ? "Insert File Code Lines: ":"" }<div>${arrayOfFiles.join("<br/>")}</div>`;
}	
	