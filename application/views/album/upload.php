<?php
use YKG\YKG;
?>
<link  rel="stylesheet" href="/public/js/plugins/jqueryupload/jquery.uploadfile.css" />
<script src="/public/js/plugins/jqueryupload/jquery.uploadfile.min.js"></script>

<div id="mulitplefileuploader" style="width:100%; border:1px dashed grey;" >Upload</div>

<div id="status"></div>
<script type="text/javascript">

$(document).ready(function()
{

	var settings = {
		url: "<?php echo YKG::app()->uri->create('album/upload',['id'=>$_GET['id']]);?>",
		method: "POST",
		acceptFiles:"image/*",
		showPreview:true,
		previewHeight: "100px",
		previewWidth: "100px",
		fileName: "album",
		maxFileSize:10*1024*1024,
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