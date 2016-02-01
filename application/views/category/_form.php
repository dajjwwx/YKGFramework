<?php 
use \YKG\YKG;
use \YKG\helpers\HHtml;
?>
<form method="post" action="<?php echo \YKG\YKG::app()->uri->create('category/create');?>">
        <div class="form-group">
                <label for="Category_name">名称</label>
                <input type="text" id="Category_name" class="form-control" name="Category[name]" />
        </div>
        <div class="form-group">
                <label for="Category_catetype">请选择类型</label>
                <select id="Category_category" name="Category[catetype]" class="form-control">
                        <?php foreach(\app\models\Category::getCategoryTypeList() as $key=>$item):?>
                        <option value="<?php echo $key;?>"><?php echo $item;?></option>
                        <?php endforeach;?>
                </select>
        </div>
        <div class="form-group">
                <label for="Category_pid">请选择分类</label>
                <?php echo HHtml::dropDownList('Category[pid]',\app\models\Category::dropDownList(true),['id'=>'Category_pid','class'=>'form-control','data-native-menu'=>'false']);?>
        </div>
        <div class="form-group">
                <label for="Category_weight">权重</label>
                <input type="text" id="Category_weight" class="form-control" name="Category[weight]" />
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-default">提交</button>
        </div>
</form>

 <script type="text/javascript">

</script>