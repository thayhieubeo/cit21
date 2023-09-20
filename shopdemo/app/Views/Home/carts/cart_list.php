
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<?php
	// session_start();
?>
<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
					<div class="table-responsive">
						<form id = "cart-form" action="cart_update" method="POST">
							<table class="table">
								<thead>
									<tr>
										<th class="cart-romove item">Xóa</th>
										<th class="cart-description item">Hình Ảnh</th>
										<th class="cart-product-name item">Tên sản phẩm</th>
										<th class="cart-qty item">Số lượng</th>
										<th class="cart-sub-total item">Giá sản phẩm</th>
										<th class="cart-total last-item">Tổng cộng</th>
									</tr>
									
								</thead><!-- /thead -->	
								<tbody>		
                                    <?php if($cart_list):?>
                                        <?php foreach($cart_list as $cart_item):?>
                                            <tr>
                                                <td class="">
                                                    <a href="remove/<?php echo $cart_item['id']?>">Xóa</a>
                                                </td>											
                                                <td class="cart-image">
                                                    <a class="entry-thumbnail" href="detail.html">
                                                        <img src="<?php echo $cart_item['image']?>" alt="">
                                                    </a>
                                                </td>
                                                <td class="cart-product-name-info">
                                                    <h4 class='cart-product-description'><a href="?UI=detail&id=<?php echo $cart_item['id']?>"><?php echo $cart_item['ten_san_pham']?></a></h4>
                                                </td>
                                                <td class="cart-product-quantity">
                                                    <div class="quant-input">
                                                        <input name='soluong[]' id="soluong" tan_id = "<?php echo $cart_item['id']?>"  onchange="soluongchange(this)" type="number" min="0" value="<?php echo $cart_item['soluong']?>">
                                                    </div>
                                                </td>
                                                <td class="cart-product-sub-total"><span class="cart-sub-total-price format_price"><?php echo $cart_item['price']?></span>
                                                </td>
                                                <td class="cart-product-grand-total">
                                                    <span class="cart-grand-total-price format_price"><?php echo $cart_item['total']?></span>
                                                </td>
                                                
                                            </tr>
                                        <?php endforeach?>
                                    <?php endif?>
								</tbody><!-- /tbody -->
								
								<tfoot>
								
									<tr>
										<td colspan="7">
											<div class="shopping-cart-btn" id="form-button">
												<span class="">
													<a href="/" class="btn btn-upper btn-primary deleteall">Tiếp Tục Mua Hàng</a>
													<input name = "update" type="submit" class="btn btn-upper btn-primary pull-right outer-right-xs" value="Cập Nhập Giỏ Hàng">
													<a href="removeall" class="btn btn-upper btn-primary deleteall">Xóa Tất Cả</a>
												</span>
											</div><!-- /.shopping-cart-btn -->
										</td>
									</tr>
								</tfoot>
							</table><!-- /table -->
							<div class="thongbao">
                                <?php if($cart_total):?>
                                    Tổng số tiền trong giỏ hàng: <span class="format_price"><?php echo $cart_total?></span>
                                <?php endif?>
							</div>
						</form>
						
						
					</div>
				</div><!-- /.shopping-cart-table -->

			</div><!-- /.body-content -->
			<script src="assets\js\jquery-1.11.1.min.js"></script>

			<script src="assets\js\bootstrap.min.js"></script>

			<script src="assets\js\bootstrap-hover-dropdown.min.js"></script>
			<script src="assets\js\owl.carousel.min.js"></script>

			<script src="assets\js\echo.min.js"></script>
			<script src="assets\js\jquery.easing-1.3.min.js"></script>
			<script src="assets\js\bootstrap-slider.min.js"></script>
			<script src="assets\js\jquery.rateit.min.js"></script>
			<script type="text/javascript" src="assets\js\lightbox.min.js"></script>
			<script src="assets\js\bootstrap-select.min.js"></script>
			<script src="assets\js\wow.min.js"></script>
			<script src="assets\js\scripts.js"></script>
