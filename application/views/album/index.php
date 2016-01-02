<?php
	use YKG\YKG;
	use YKG\helpers\HHtml;
	use YKG\helpers\Util;
	use app\models\File;
?>
<div class="posts">
	<article id="56" class="post">	
		<section class="col-md-6">
			<h1>Album</h1>
		</section>	
		<section class="col-md-6">
			<h1>				
				<a href="<?php echo YKG::app()->uri->create('album/create');?>" class="btn btn-lg btn-primary btn-shadow pull-right">
					<span class="glyphicon glyphicon-picture"></span>  New Album
				</a>
			</h1>			
		</section>		
		<hr class="clearfix" />
	</article>
	<?php foreach ($data as $model):?>
	<article id="56" class="post">
		<section id="109" class="post-content col-md-5">
			<div style="boder:2px solid red">
				<div style="border:10px solid #EFEFEF;background-color:white;">
					 <?php  $folder = File::find([
					 	'conditions'=>[
							'album_id'=>$model->id
						],
					 	'order'=>'rand()',
					 	'limit'=>1
					 ]);?>
					 <?php $img =  HHtml::img('/public/uploads/'.date('Y/m/d',$folder->publish).'/'.$folder->name,['width'=>'100%']);?>
					 <?php echo HHtml::link($img, ['album/impress','id'=>$model->id]);?>

				</div>
				<div class="row">
					<h1 style="text-align:center;"><i class="fa fa-folder-open-o"></i><?php echo HHtml::link($model->name,['album/view','id'=>$model->id]);?></h1>

				</div>
			</div>
		</section>
		<section class="col-md-7">
			<ul  style="list-style:none;">			
			<?php
				$models = File::find('all',[
					'conditions'=>[
						'album_id'=>$model->id
					],
					'limit'=>4,
					'order'=>'id DESC'
				]);

			?>
				<?php foreach ($models as $item):?> 
				<li class="col-md-6 bs-docs-booticon bs-docs-booticon-lg bs-docs-booticon-outline" style="margin:10px 0;height:100px;overflow:hidden;">
					<?php echo HHtml::img('/public/uploads/'.date('Y/m/d',$item->publish).'/'.$item->name,['width'=>'100%','border'=>'5px solid white','margin'=>'3px','padding'=>'10px']);?>
				</li>
				<?php endforeach;?>
			</ul>
		</section>
		<footer class="post-footer clearfix">
			<div class="pull-left tag-list">
				<span class="glyphicon glyphicon-cloud-upload"></span>
				<?php echo HHtml::link('添加相片',['album/upload','id'=>$model->id]);?>
		            	<i class="glyphicon glyphicon-tags"></i>
		            	<a href="/?r=blog/tag&amp;name=Dream">Dream</a>
		       </div>
			<div class="pull-right share">
			       <a href="/post/laravel-spark-alpha-released/" class="pull-right">阅读全文</a>
			</div>
		</footer>
	</article>
	<?php endforeach;?>


</div>