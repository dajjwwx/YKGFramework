<?php 
use \YKG\helpers\Util;
use \YKG\helpers\HHtml;
use \app\models\Category;
use YKG\helpers\Parsedown;


$parsedown = new Parsedown();
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

<div class="posts">
<?php foreach ($dataProvider as $item) :?>
	 <script type="text/javascript">
    $(function() {
       editormd_<?php echo $item->id; ?> = editormd.markdownToHTML("editormd-view-<?php echo $item->id;?>", {
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
<article id="56" class="post tag-php">

    <header class="post-head">
        <h1 class="post-title"><?php echo HHtml::link($item->title,['quickstart/view','id'=>$item->id]);?></h1>
        <section class="post-meta">
            <span class="author">作者：<a href="/author/wangsai/"><?php echo $item->user->name;?></a></span> •
            <time class="post-date"><?php echo date('Y-m-d',$item->modify);?></time>
        </section>
    </header>

    <section class="featured-media">
    </section>

    <section  id="editormd-view-<?php echo $item->id;?>" class="post-content">
                <textarea id="append-test-<?php echo $item->id;?>" style="display:none;">
<?php echo $item->content;?>
                </textarea>
    </section>

    <footer class="post-footer clearfix">
        <div class="pull-left tag-list">
            <i class="fa fa-folder-open-o"></i>
            <a href="/tag/php/">PHP</a>
        </div>

        <div class="pull-right share">
                <a href="/post/laravel-spark-alpha-released/" class="pull-right">阅读全文</a>
        </div>
    </footer>
</article>

<?php endforeach;?>