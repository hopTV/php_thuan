<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }else {
        $id = '';
    }
    $sql_chitiet = mysqli_query($con,'select * from sanpham where sanpham_id = '.$id.' ')
?>

<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="index.php">Home</a>
                    <i>|</i>
                </li>
                <li>Single Product 1</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- Single Page -->

<!-- <?php
    while($row_chitiet = mysqli_fetch_array($sql_chitiet)) {
    
?> -->
<div class="banner-bootom-w3-agileits py-5">
    <div class="container py-xl-4 py-lg-2">
      
        <div class="row">
            <div class="col-lg-5 col-md-8 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="images/<?php echo $row_chitiet['sanpham_img'] ?>">
                                <div class="thumb-image">
                                    <img src="images/<?php echo $row_chitiet['sanpham_img'] ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 single-right-left simpleCart_shelfItem">
                <h3 class="mb-3"><?php echo $row_chitiet['sanpham_name'] ?></h3>
                <p class="mb-3">
                    <span class="item_price"><?php echo number_format($row_chitiet['sanpham_promotion']) ?></span>
                    <del class="mx-2 font-weight-light"><?php echo number_format($row_chitiet['sanpham_price']) ?></del>
                    <label>Miễn Phí Vận Chuyển</label>
                </p>
                <div class="product-single-w3l">
                    <p><?php echo $row_chitiet['sanpham_detail'] ?></p>
                    <p><?php echo $row_chitiet['sanpham_mota'] ?></p>
                </div>
                <div class="occasion-cart">
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                        <form action="?quanly=giohang" method="post">
                            <fieldset>
                                <input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['sanpham_name']?>" />
                                <input type="hidden" name="sanphamid" value="<?php echo $row_chitiet['sanpham_id']?>" />
                                <input type="hidden" name="price" value="<?php echo $row_chitiet['sanpham_price']?>" />
                                <input type="hidden" name="soluong" value="1" />
                                <input type="hidden" name="img" value="<?php echo $row_chitiet['sanpham_img']?>" />
       
                                
                                <input type="submit" name="submit" value="Thêm Giỏ Hàng" class="button" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <?php
    }
?> -->
<!-- //Single Page -->
