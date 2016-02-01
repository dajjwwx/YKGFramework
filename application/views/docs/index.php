<link rel="stylesheet" href="/public/js/plugins/editormd/css/editormd.preview.css" />
<script src="/public/js/plugins/editormd//lib/marked.min.js"></script>
<script src="/public/js/plugins/editormd//lib/prettify.min.js"></script>        
<script src="/public/js/plugins/editormd//lib/raphael.min.js"></script>
<script src="/public/js/plugins/editormd//lib/underscore.min.js"></script>
<script src="/public/js/plugins/editormd//lib/sequence-diagram.min.js"></script>
<script src="/public/js/plugins/editormd//lib/flowchart.min.js"></script>
<script src="/public/js/plugins/editormd//lib/jquery.flowchart.min.js"></script>

 <script src="/public/js/plugins/editormd/editormd.min.js"></script>
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
            <div id="editormd-view">
                <textarea id="append-test" style="display:none;">

###科学公式 TeX(KaTeX)
                    
$$E=mc^2$$

行内的公式$$E=mc^2$$行内的公式，行内的$$E=mc^2$$公式。

Other Equations $$ \sqrt{3x-1}$$
I don't wanna say anything $$\(\sqrt{3x-1}+(1+x)^2\)$$
                    
$$\sin(\alpha)^{\theta}=\sum_{i=0}^{n}(x^i + \cos(f))$$

$$X^2 > Y$$

#####上标和下标

上标：X&lt;sup&gt;2&lt;/sup&gt;

下标：O&lt;sub&gt;2&lt;/sub&gt;

##### 代码块里包含的过滤标签及属性不会被过滤

```html
<style type="text/style">
body{background:red;}
</style>

&lt;script type="text/javscript"&gt;
alert("script");
&lt;/script&gt;

&lt;iframe height=498 width=510 src="http://player.youku.com/embed/XMzA0MzIwMDgw" frameborder=0 allowfullscreen&gt;&lt;/iframe&gt;
```
		</textarea>          
       	</div>



<div class="editormd" id="test-editormd">
    <script type="text/markdown">###Hello world!</script>
</div>