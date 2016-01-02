<?php 
use YKG\YKG;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    	<!-- Required meta tags always come first -->
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta http-equiv="x-ua-compatible" content="ie=edge">

    	<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="/public/css/bootstrap.css" />
    	<link rel="stylesheet" href="/public/css/style.css" />
       <link rel="stylesheet" href="/public/css/post.css" />
       <link rel="stylesheet" href="/public/js/plugins/editormd/css/editormd.css" />

    	 <!-- jQuery first, then Bootstrap JS. -->
    	<script src="/public/js/jquery.min.js"></script>
    	<script src="/public/js/bootstrap.min.js"></script>

        
  </head>
  <body>
  <header>
    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo YKG::app()->uri->create('site/index');?>"><?php echo YKG::app()->name;?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo YKG::app()->uri->create('docs/index');?>">Document</a></li>
            <li><a href="<?php echo YKG::app()->uri->create('quickstart/index');?>">Quick Start</a></li>
            <li><a href="<?php echo YKG::app()->uri->create('album/index');?>">Album</a></li>

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if(YKG::app()->user->isGuest()):?>
            <li>
                <a href="<?php echo YKG::app()->uri->create('site/login'); ?>"><?php echo YKG::t('common','Login');?>
                <span class="glyphicon glyphicon-cog"></span>
                </a>
            </li>
            <?php else:?> 
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo YKG::app()->user->name;?>  <span class="glyphicon glyphicon-cog"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo YKG::app()->uri->create('site/logout');?>" ><?php echo YKG::t('common','Logout');?></a></li>
                <li><a href="<?php echo YKG::app()->uri->create('blog/publish'); ?>">Publish Documents</a></li>
                <li><a href="<?php echo YKG::app()->uri->create('category/create');?>">Create Category</a></li>
                <li><a href="<?php echo YKG::app()->uri->create('album/upload');?>">Albums</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>            
          <?php endif;?>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
</header>
       <ykg:content></ykg:content>
       <?php echo $this->renderPartial('//layouts/footer');?>
  </body>
</html>