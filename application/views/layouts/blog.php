<?php 
use app\models\Post;
use YKG\helpers\HHtml;
?>
<?php $this->beginContent('//layouts/base');?>
	<div class="container">
		<div class="row">
			<aside id="sidebar" class="col-lg-4 pull-right">
				 <div class="panel panel-default">
  					<div class="panel-body">
					       <ul class="list-group">
					       		<?php foreach(Post::find('all') as $item):?>
					           	<li class="list-group-item"><?php echo HHtml::link($item->title,['blog/view','id'=>$item->id]);?></li>
							<?php endforeach;?>				            
					        </ul>
					</div>
				</div>
			</aside>
			<div class="col-lg-8">
				<ykg:content></ykg:content>
			</div>
		</div>
	        
	</div><!-- /.container -->
<?php $this->endContent();?>