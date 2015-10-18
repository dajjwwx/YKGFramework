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
    	<script src="/public/js/bootstrap.js"></script>
        
  </head>
  <body>
	<nav class="navbar navbar-default navbar-fixed-top">
	      	<a class="navbar-brand" href="#"><?php echo \YKG\YKG::app()->name;?></a>
	      	<ul class="nav nav-pills">
	        	<li class="nav-item active">
	          		<a class="nav-link" href="#">Document <span class="sr-only">(current)</span></a>
	        	</li>
		        <li class="nav-item">
		          	<a class="nav-link" href="#">Quick Start</a>
		        </li>
                       <li class="nav-item">
                              <a class="nav-link" href="<?php echo YKG::app()->uri->create('blog/publish'); ?>">Publish Documents</a>
                       </li>
	      	</ul>
    	</nav>

        <ykg:content></ykg:content>

  </body>
</html>