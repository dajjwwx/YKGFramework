<?php
use YKG\YKG;
?>
<style type="text/css" href="/public/js/plugins/jqueryupload/jquery.uploadfile.css"></style>
<script src="/public/js/plugins/jqueryupload/jquery.uploadfile.min.js"></script>

<form action="<?php echo YKG::app()->uri->create('album/test');?>" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>

<div id="mulitplefileuploader">Upload</div>

<div id="status"></div>
<script>

$(document).ready(function()
{

var settings = {
	url: "<?php echo YKG::app()->uri->create('album/upload');?>",
	method: "POST",
	allowedTypes:"jpg,png,gif,doc,pdf,zip",
	fileName: "myfile",
	multiple: true,
	onSuccess:function(files,data,xhr)
	{
		$("#status").html("<font color='green'>Upload is success</font>");
		
	},
	onError: function(files,status,errMsg)
	{		
		$("#status").html("<font color='red'>Upload is Failed</font>");
	}
}
$("#mulitplefileuploader").uploadFile(settings);

});
</script>