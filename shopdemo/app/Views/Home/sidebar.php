
<div class="side-menu animate-dropdown outer-bottom-xs">
  <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>DANH MỤC SẢN PHẨM</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
        
      <?php foreach($menu_sidebar as $m):?>
        <li class="dropdown menu-item"> <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i><?=$m['ten_menu']?></a>
        <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
            <div class="row">                            
            <?php echo view('Home/partial',['id'=>$m['id']]) ?>
            </div>
            </li>
        </ul>
        </li>
        
      <?php endforeach?>
        
      </ul>
    </nav>
</div>
<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title"><?=$group_spbanchay['ten']?></h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
            
          <?php foreach($product_order as $row):?>
                    <div class="item">
                      <div class="products">
                        <div class="hot-deal-wrapper">
                          <div class="image"> <img src="<?php echo $row['image']?>" alt=""> </div>
                          <div class="sale-offer-tag"><span>HOT</span></div>                          
                        </div>
                        <!-- /.HOT DEALS -->
                        <div class="product-info text-left m-t-20">
                          <h3 class="name"><a href="?UI=detail&id=<?php echo $row['id']?>"><?php echo $row['ten_san_pham']?></a></h3>
                          <div class="rating rateit-small"></div>
                          <!-- /.product-price --> 
                          <div class="product-price"> <span class="price format_price"> <?php echo $row['price']?></div>
                        
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <div class="add-cart-button btn-group">
                              
                              <form action="include/data_processing/themgiohang.php?id=<?php echo $row['id']?>" method="POST">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                  <input name ="themgiohang" type="submit" class="btn btn-primary" value="Thêm Giỏ Hàng">
                              </form>
                            </div>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                    </div>
                  <?php endforeach?>
          </div>
          <!-- /.sidebar-widget --> 
        </div>
        <!-- ============================================== Sản Phẩm bán Chạy sidebar: END ============================================== --> 
        
        <!-- ============================================== SẢN PHẨM NỔI BẬT ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title"><?=$group_spnoibat['ten']?></h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
              
            <?php foreach($product_view as $row):?>
                      <div class="item">
                        <div class="products special-product">
                          <div class="product">
                            <div class="product-micro">
                              <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                  <div class="product-image">
                                    <div class="image"> <a href="?UI=detail&id=<?php echo $row['id']?>"> <img src="<?php echo $row['image']?>" alt=""> </a> </div>
                                    <!-- /.image --> 
                                    
                                  </div>
                                  <!-- /.product-image --> 
                                </div>
                                <!-- /.col -->
                                <div class="col col-xs-7">
                                  <div class="product-info">
                                    <h3 class="name"><a href="?UI=detail&id=<?php echo $row['id']?>"><?php echo $row['ten_san_pham']?></a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="product-price"> <span class="price format_price"><?php echo $row['price']?></span></div>
                                    <!-- /.product-price --> 
                                    
                                  </div>
                                </div>
                                <!-- /.col --> 
                              </div>
                              <!-- /.product-micro-row --> 
                            </div>
                            <!-- /.product-micro --> 
                            
                          </div>
                        </div>
                      </div>
                    <?php endforeach?>
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
        <!-- ============================================== SẢN PHẨM KHÁC ============================================== -->
