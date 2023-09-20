
<?php
    $service =  new \App\Services\MenuService;
    $result = $service -> getAllMenuByPartner($id);
?>
<?php foreach($result as $m):?>
    <div class="col-xs-12 col-sm-12 col-md-2 col-menu">        
    <h2 class="title">
        <?=$m['ten_menu']?>                      
    </h2>
    <?php echo view('Home/partial_child',['id'=>$m['id']]) ?>
    </div>
    <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="assets\images\banners\banner-side.png"></a> </div>
    
<?php endforeach?>