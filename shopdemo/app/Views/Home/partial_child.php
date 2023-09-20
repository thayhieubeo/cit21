
<?php
    $service =  new \App\Services\MenuService;
    $result = $service -> getAllMenuByPartner($id);
?>
<?php foreach($result as $m):?>
    <ul ul class="links">
        <li><a href=""><?=$m['ten_menu']?></a></li>
    </ul>
<?php endforeach?>