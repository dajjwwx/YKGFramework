<?php
use app\models\File;
use YKG\helpers\HHtml;
?>
<link rel="stylesheet" type="text/css" href="/public/js/plugins/wookmark/css/main.css" />
<ul class="tiles-wrap animated">
<?php foreach($models as $item):?>
	<li>
	<a href="#">
 		<?php echo HHtml::img('/public/uploads/'.date('Y/m/d',$item->publish).'/'.$item->name,['width'=>'80%','style'=>"border:5px solid #E8E8E8;margin:3px;"]);?> 
	</a>
	</li>
 <?php endforeach;?>
</ul>


      <ul class="tiles-wrap animated">
        <!-- These are our grid blocks -->
        <li><img src="../sample-images/image_1.jpg" width="200" height="283"><p>1</p></li>
        <li><img src="../sample-images/image_2.jpg" width="200" height="300"><p>2</p></li>
        <li><img src="../sample-images/image_3.jpg" width="200" height="252"><p>3</p></li>
        <li><img src="../sample-images/image_4.jpg" width="200" height="158"><p>4</p></li>
        <li><img src="../sample-images/image_5.jpg" width="200" height="300"><p>5</p></li>
        <li><img src="../sample-images/image_6.jpg" width="200" height="297"><p>6</p></li>
        <li><img src="../sample-images/image_7.jpg" width="200" height="200"><p>7</p></li>
        <li><img src="../sample-images/image_8.jpg" width="200" height="200"><p>8</p></li>
        <li><img src="../sample-images/image_9.jpg" width="200" height="398"><p>9</p></li>
        <li><img src="../sample-images/image_10.jpg" width="200" height="267"><p>10</p></li>
        <li><img src="../sample-images/image_1.jpg" width="200" height="283"><p>11</p></li>
        <li><img src="../sample-images/image_2.jpg" width="200" height="300"><p>12</p></li>
        <li><img src="../sample-images/image_3.jpg" width="200" height="252"><p>13</p></li>
        <li><img src="../sample-images/image_4.jpg" width="200" height="158"><p>14</p></li>
        <li><img src="../sample-images/image_5.jpg" width="200" height="300"><p>15</p></li>
      </ul>

      <hr>

      <ul class="tiles-wrap animated">
        <li><img src="../sample-images/image_6.jpg" width="200" height="297"><p>16</p></li>
        <li><img src="../sample-images/image_7.jpg" width="200" height="200"><p>17</p></li>
        <li><img src="../sample-images/image_8.jpg" width="200" height="200"><p>18</p></li>
        <li><img src="../sample-images/image_9.jpg" width="200" height="398"><p>19</p></li>
        <li><img src="../sample-images/image_10.jpg" width="200" height="267"><p>20</p></li>
        <li><img src="../sample-images/image_1.jpg" width="200" height="283"><p>21</p></li>
        <li><img src="../sample-images/image_2.jpg" width="200" height="300"><p>22</p></li>
        <li><img src="../sample-images/image_3.jpg" width="200" height="252"><p>23</p></li>
        <li><img src="../sample-images/image_4.jpg" width="200" height="158"><p>24</p></li>
        <li><img src="../sample-images/image_5.jpg" width="200" height="300"><p>25</p></li>
        <li><img src="../sample-images/image_6.jpg" width="200" height="297"><p>26</p></li>
        <li><img src="../sample-images/image_7.jpg" width="200" height="200"><p>27</p></li>
        <li><img src="../sample-images/image_8.jpg" width="200" height="200"><p>28</p></li>
        <li><img src="../sample-images/image_9.jpg" width="200" height="398"><p>29</p></li>
        <li><img src="../sample-images/image_10.jpg" width="200" height="267"><p>30</p></li>
        <!-- End of grid blocks -->
      </ul>

 <script type="text/javascript" src="/public/js/plugins/wookmark/wookmark.js"></script>

 <!-- Once the page is loaded, initalize the plug-in. -->
  <script type="text/javascript">
    (function ($) {
      var wookmark = $('.tiles-wrap').wookmark({
          // Prepare layout options.
          autoResize: true, // This will auto-update the layout when the browser window is resized.
          offset: 5, // Optional, the distance between grid items
          outerOffset: 10, // Optional, the distance to the containers border
          itemWidth: 210 // Optional, the width of a grid item
      });

      // Capture clicks on grid items.
      $('.tiles-wrap').on('click', 'li', function () {
        // Randomize the height of the clicked item.
        var newHeight = $('img', this).height() + Math.round(Math.random() * 300 + 30);
        $(this).css('height', newHeight+'px');

        // Update the layout.
        wookmark.layout(true);
      });
    })(jQuery);
  </script>
