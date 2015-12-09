<?php 
use YKG\helpers\HHtml;
?>
<link rel="stylesheet" href="/public/js/plugins/editormd/css/editormd.preview.css" />
<script src="/public/js/plugins/editormd//lib/marked.min.js"></script>
<script src="/public/js/plugins/editormd//lib/prettify.min.js"></script>        
<script src="/public/js/plugins/editormd//lib/raphael.min.js"></script>
<script src="/public/js/plugins/editormd//lib/underscore.min.js"></script>
<script src="/public/js/plugins/editormd//lib/sequence-diagram.min.js"></script>
<script src="/public/js/plugins/editormd//lib/flowchart.min.js"></script>
<script src="/public/js/plugins/editormd//lib/jquery.flowchart.min.js"></script>

 <script src="/public/js/plugins/editormd/editormd.min.js"></script>
 
 <script type="text/javascript"
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
</script>
 <script type="text/javascript">
    $(function() {
       editormd = editormd.markdownToHTML("editormd-view", {
                    htmlDecode      : "style,script,iframe",  // you can filter tags decode
                    emoji           : true,
                    taskList        : true,
                    tex             : true,  // 默认不解析
                    flowChart       : true,  // 默认不解析
                    sequenceDiagram : true,  // 默认不解析
                    path    : "/public/js/plugins/editormd/lib/",
       });

    });


</script>

<div class="posts">
	<div class="post">
		 <h1 class="post-title">
		 	<?php echo HHtml::link($model->title, ['blog/view','id'=>$model->id]);?>
		</h1>
	    	<span class="post-date"><?php echo date('Y-m-d', $model->publish);?></span>	    
		<div class="tweet-button">
					 
		</div>
            	<div id="editormd-view">
                	<textarea id="append-test" style="display:none;">
				<?php echo $model->content;?>
                	</textarea>
        	</div>
	  </div>

</div>