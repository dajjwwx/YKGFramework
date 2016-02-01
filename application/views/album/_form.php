<?php
use YKG\YKG;
use YKG\helpers\HHtml;
use app\models\Category;
?>
<form method="post" action="<?php echo \YKG\YKG::app()->uri->create('album/create');?>">
        <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
	               <input type="text" id="Album_title" class="form-control" name="Album[name]" placeholder="相册名称" />
	     </div>
	</div>
               <div class="col-md-6">
                       <div class="form-group">
                       <?php echo HHtml::dropDownList('Album[album_id]',Category::dropDownList(),['id'=>'Album_album_id','class'=>'form-control','data-native-menu'=>'false']);?>
                       </div>
               </div>
        </div>
       <div class="form-group">
	       	<?php echo HHtml::text('Album[description]',['class'=>'form-control','placeholder'=>'Description']);?>
       </div>

        <div class="form-group">
        	<button type="submit" class="btn btn-default">提交</button>
        </div>
</form>
