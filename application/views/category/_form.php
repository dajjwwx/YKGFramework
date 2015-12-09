<?php 
use \YKG\YKG;
?>
<form method="post" action="<?php echo \YKG\YKG::app()->uri->create('category/create');?>">
        <div class="form-group">
                <label for="Category_name">名称</label>
                <input type="text" id="Category_name" class="form-control" name="Category[name]" />
        </div>
        <div class="form-group">
                <label for="Category_pid">请选择分类</label>
                <select id="Category_pid" name="Category[pid]" class="form-control">
                        <option value="0">无</option>
                        <?php foreach(\app\models\Category::getCategoryModels() as $item):?>
                        <option value="<?php echo $item->id;?>"><?php echo $item->name;?></option>
                        <?php endforeach;?>
                </select>
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