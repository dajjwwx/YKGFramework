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

    	<div class="step" data-x="<?php echo $i*1000;?>" data-y="<?php echo rand(0, 1000);?>" data-rotate="<?php echo rand(0,90);?>">
                <?php $img =  HHtml::img('/public/uploads/'.date('Y/m/d',$item->publish).'/'.$item->name,['style'=>"border:5px solid #E8E8E8;margin:3px;width:100%;max-height:100%;"]);?>
                
                <?php echo HHtml::link($img, ['album/view','id'=>$item->id]);?>
    	</div>

    	<?php endforeach;?>
</div>