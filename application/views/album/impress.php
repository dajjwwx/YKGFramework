<?php
use app\models\File;
use YKG\helpers\HHtml;
?>
<div id="impress">
    <?php $model = File::all([
            'conditions'=>[
                'album_id'=>$_GET['id']
            ],

    ]);

        $i = 1;
    ?>
    	<?php foreach ($model as $item) :?>

        <?php $i++;?>

    	<div class="step" data-x="<?php echo $i*1000;?>" data-y="-1500" data-rotate="<?php echo rand(0,90);?>">
                <?php $img =  HHtml::img('/public/uploads/'.date('Y/m/d',$item->publish).'/'.$item->name,['width'=>'100%']);?>
                
                <?php echo HHtml::link($img, ['album/view','id'=>$item->id]);?>
    	</div>

    	<?php endforeach;?>
</div>