<?php
use YKG\YKG;
use YKG\helpers\HHtml;
use app\models\Category;
?>
<form method="post" action="<?php echo \YKG\YKG::app()->uri->create('blog/publish');?>">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<input type="text" id="Post_title" class="form-control" name="Post[title]" placeholder="标题" />
			</div>
		</div>
		<div class="col-md-6">
		        <div class="form-group">
		        	<?php echo HHtml::dropDownList('Post[category_id]',Category::dropDownList(),['id'=>'Post_category_id','class'=>'form-control','data-native-menu'=>'false']);?>
		        </div>
		</div>
	</div>
        <div id="editormd">
		<textarea style="display:none;"></textarea>
        </div>
       <div class="form-group">
	       	<?php echo HHtml::text('Post[tags]',['class'=>'form-control','placeholder'=>'Tags']);?>
	</div>

        <div class="form-group">
        	<button type="submit" class="btn btn-default">提交</button>
        </div>
</form>
 <script src="/public/js/plugins/editormd/editormd.min.js"></script>
 <script type="text/javascript">
	var testEditor;

	$(function() {
		testEditor = editormd("editormd", {
		        width   : "100%",
		        height  : 340,
		        syncScrolling : "single",
		        saveHTMLToTextarea : true,
		        path    : "/public/js/plugins/editormd/lib/",

                        // theme : "dark",
                        // previewTheme : "dark",
                        // editorTheme : "pastel-on-dark",
                        //markdown : md,
                        codeFold : true,
                        //syncScrolling : false,
                        saveHTMLToTextarea : true,    // 保存 HTML 到 Textarea
                        searchReplace : true,
                        //watch : false,                // 关闭实时预览
                        htmlDecode : "style,script,iframe|on*",            // 开启 HTML 标签解析，为了安全性，默认不开启    
                        //toolbar  : false,             //关闭工具栏
                        //previewCodeHighlight : false, // 关闭预览 HTML 的代码块高亮，默认开启
                        emoji : true,
                        taskList : true,
                        tocm            : true,         // Using [TOCM]
                        tex : true,                   // 开启科学公式TeX语言支持，默认关闭
                        flowChart : true,             // 开启流程图支持，默认关闭
                        sequenceDiagram : true,       // 开启时序/序列图支持，默认关闭,
                        //dialogLockScreen : false,   // 设置弹出层对话框不锁屏，全局通用，默认为true
                        //dialogShowMask : false,     // 设置弹出层对话框显示透明遮罩层，全局通用，默认为true
                        //dialogDraggable : false,    // 设置弹出层对话框不可拖动，全局通用，默认为true
                        //dialogMaskOpacity : 0.4,    // 设置透明遮罩层的透明度，全局通用，默认值为0.1
                        //dialogMaskBgColor : "#000", // 设置透明遮罩层的背景颜色，全局通用，默认为#fff
                        imageUpload : true,
                        imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                        imageUploadURL : "<?php echo YKG::app()->uri->create('blog/upload');?>",
                        onload : function() {
                            console.log('onload', this);
                            //this.fullscreen();
                            //this.unwatch();
                            //this.watch().fullscreen();

                            //this.setMarkdown("#PHP");
                            //this.width("100%");
                            //this.height(480);
                            //this.resize("100%", 640);
                        }

		});
});
</script>