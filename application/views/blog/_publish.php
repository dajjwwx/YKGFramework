 <form method="post" action="<?php echo \YKG\YKG::app()->uri->create('blog/publish');?>">
            <div id="test-editormd">
                <textarea style="display:none;">[TOC]

#### Disabled options

- TeX (Based on KaTeX);
- Emoji;
- Task lists;
- HTML tags decode;
- Flowchart and Sequence Diagram;

#### Math Equation
$$m^2=2*m$$

$$\(\sqrt{3x-1}+(1+x)^2\)$$
                    
$$\sin(\alpha)^{\theta}=\sum_{i=0}^{n}(x^i + \cos(f))$$

$$X^2 > Y$$


#### Editor.md directory

    editor.md/
            lib/
            css/
            scss/
            tests/
            fonts/
            images/
            plugins/
            examples/
            languages/     
            editormd.js
            ...

```html
&lt;!-- English --&gt;
&lt;script src="../dist/js/languages/en.js"&gt;&lt;/script&gt;

&lt;!-- 繁體中文 --&gt;
&lt;script src="../dist/js/languages/zh-tw.js"&gt;&lt;/script&gt;
```
</textarea>
            </div>

            <button type="submit" id="submit">Submit</button>
</form>

        <!-- <script src="js/zepto.min.js"></script>
        <script>        
            var jQuery = Zepto;  // 为了避免修改flowChart.js和sequence-diagram.js的源码，所以使用Zepto.js时想支持flowChart/sequenceDiagram就得加上这一句
        </script> -->
        <script src="/public/js/plugins/editormd/lib/marked.min.js"></script>
        <script src="/public/js/plugins/editormd/lib/prettify.min.js"></script>
        
        <script src="/public/js/plugins/editormd/lib/raphael.min.js"></script>
        <script src="/public/js/plugins/editormd/lib/underscore.min.js"></script>
        <script src="/public/js/plugins/editormd/lib/sequence-diagram.min.js"></script>
        <script src="/public/js/plugins/editormd/lib/flowchart.min.js"></script>
        <script src="/public/js/plugins/editormd/lib/jquery.flowchart.min.js"></script>
        <script src="/public/js/plugins/editormd/editormd.min.js"></script>



        <script type="text/javascript">
	var testEditor;

                $(function() {
                // testEditor = editormd("test-editormd", {
                //         width   : "100%",
                //         height  : 640,
                //         syncScrolling : "single",
                //         saveHTMLToTextarea : true,
                //         path    : "/public/js/plugins/editormd/lib/"
                // });

                testEditormdView2 = editormd.markdownToHTML("test-editormd", {
                    htmlDecode      : "style,script,iframe",  // you can filter tags decode
                    tocm            :true,
                    emoji           : true,
                    taskList        : true,
                    tex             : true,  // 默认不解析
                    flowChart       : true,  // 默认不解析
                    sequenceDiagram : true,  // 默认不解析

                    // // markdown        : markdown ,//+ "\r\n" + $("#append-test").text(),
                    //     //htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
                    //     htmlDecode      : "style,script,iframe",  // you can filter tags decode
                    //     //toc             : false,
                    //     tocm            : true,    // Using [TOCM]
                    //     //tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
                    //     //gfm             : false,
                    //     //tocDropdown     : true,
                    //     // markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
                    //     emoji           : true,
                    //     taskList        : true,
                    //     tex             : true,  // 默认不解析
                    //     flowChart       : true,  // 默认不解析
                    //     sequenceDiagram : true,  // 默认不解析

                });


                // $("#submit").click(function(){
                //     alert(testEditor.getMarkdown()); 
                //     alert(testEditor.getHTML());
                //     alert(testEditor.getPreviewedHTML());

                // });

                //testEditor.getMarkdown();       // 获取 Markdown 源码
                //testEditor.getHTML();           // 获取 Textarea 保存的 HTML 源码
                //testEditor.getPreviewedHTML();  // 获取预览窗口里的 HTML，在开启 watch 且没有开启 saveHTMLToTextarea 时使用

            });
        </script>