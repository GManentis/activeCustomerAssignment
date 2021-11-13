<html>
<head>
<style>
.inputMargins{
	margin-top:10px;
}
</style>

</head>
<body>
<form method="post" action="result.php">  
<div class="inputMargins">
	Insert number of cores: <input type="text" name="cores" id="cores"/>
</div>
<div class="inputMargins">
	Insert files limit: <input type="text" name="limit"/>
</div>
<div class="inputMargins">
	Insert number of files: <input type="text" name="numFiles" id="numFiles"/> <button type="button" id="setFiles">Click here to set lines for each file</button>
</div>
<div id="fileInputs" class="inputMargins">
</div>
<div class="inputMargins">
<input type="submit" name="submit"/>
</div>
</form>
<script type="text/javascript" src="functions.js"></script>
<script>
</script> 
</body>
</html>