
<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h2 style="padding: 10px;text-align: center"> Sản Phẩm </h2>
        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-9">
                <div class="wrapper">
                    <!-- first section -->
                    <?php
                        $sql_cate = mysqli_query($con,'select * from category order by category_id desc');
                        while($row_home = mysqli_fetch_array($sql_cate)) {
                            $id_cate = $row_home['category_id'];

                        
                    ?>
                    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                        <h3 class="heading-tittle text-center font-italic"><?php echo $row_home['category_name'] ?></h3>
                        <div class="row">
                            <?php
                                $product = mysqli_query($con,'select * from sanpham where sanpham_active = 1 order by sanpham_id desc');
                                while($row_product = mysqli_fetch_array($product)) {
                                    if($row_product['category_id'] == $id_cate) {

                                
                            ?>
                            <div class="col-md-4 product-men mt-5">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item text-center">
                                        <img src="images/<?php echo $row_product['sanpham_img'] ?>" alt="">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="?quanly=chitietsp&id=<?php echo $row_product['sanpham_id'] ?>" class="link-product-add-cart">xem sản phẩm</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info-product text-center border-top mt-4">
                                        <h4 class="pt-1">
                                            <a href="?quanly=chitietsp&id=<?php echo $row_product['sanpham_id'] ?>"><?php echo $row_product['sanpham_name'] ?></a>
                                        </h4>
                                        <div class="info-product-price my-2">
                                            <span class="item_price"><?php echo number_format($row_product['sanpham_promotion']).' VND' ?></span> <br>
                                            <del><?php echo number_format($row_product['sanpham_price']).' VND' ?></del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            <form action="?quanly=giohang" method="post">
                                                <fieldset>
                                                    <input type="hidden" name="tensanpham" value="<?php echo $row_product['sanpham_name']?>" />
                                                    <input type="hidden" name="sanphamid" value="<?php echo $row_product['sanpham_id']?>" />
                                                    <input type="hidden" name="price" value="<?php echo $row_product['sanpham_price']?>" />
                                                    <input type="hidden" name="soluong" value="1" />
                                                    <input type="hidden" name="img" value="<?php echo $row_product['sanpham_img']?>" />
                        
                                                    
                                                    <input type="submit" name="submit" value="Thêm Giỏ Hàng" class="button" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            }
                            ?>
                            
                        </div>
                    </div>
                    <?php
                            }
                    ?>
    
                </div>
            </div>
            <!-- //product left -->
            <?php
                include 'inc/sidebar.php';
            ?>
            
        </div>
    </div>
</div>
<!-- //top products -->