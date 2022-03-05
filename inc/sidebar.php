<!-- product right -->
<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
    <div class="side-bar p-sm-4 p-3">
        <div class="search-hotel border-bottom py-2">
            <h3 class="agileits-sear-head mb-3">Tìm Kiếm..</h3>
            <form action="#" method="post">
                <input type="search" placeholder="sản phẩm " name="search" required="">
                <input type="submit" value=" ">
            </form>
        </div>
        <!-- price -->
        <div class="range border-bottom py-2">
            <h3 class="agileits-sear-head mb-3">Gía</h3>
            <div class="w3l-range">
                <ul>
                    <li>
                        <a href="#">dưới 1 triệu</a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <!-- //price -->
        
        <!-- reviews -->
        <div class="customer-rev border-bottom left-side py-2">
            <h3 class="agileits-sear-head mb-3">Khách hàng Review</h3>
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>5.0</span>
                    </a>
                </li>
                
                
                
            </ul>
        </div>
        <!-- //reviews -->
        <!-- electronics -->
        <div class="left-side border-bottom py-2">
            <h3 class="agileits-sear-head mb-3">Danh Mục Sản Phẩm</h3>
            <ul>
            <?php
                    $sidebar = mysqli_query($con,'select * from category order by category_id desc');
                    while($row_sidebar = mysqli_fetch_array($sidebar)) {

                    
                ?>
                <li>
                    <input type="checkbox" class="checked">
                    <span class="span"> <a href="danhmuc.php?id=<?php echo $row_sidebar['category_id'] ?>"> <?php echo $row_sidebar['category_name'] ?></a></span>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
        <!-- //electronics -->
        
        
        <!-- //arrivals -->
        <!-- best seller -->
        <div class="f-grid py-2">
            <h3 class="agileits-sear-head mb-3">Sản Phẩm Bán Chạy</h3>
            <div class="box-scroll">
                <div class="scroll">
                    <?php
                        $product_sidebar = mysqli_query($con ,'select * from sanpham where sanpham_hot = 0 order by sanpham_id desc');
                        while($row_product_sidebar = mysqli_fetch_array($product_sidebar)) {

                        
                    ?>
                    <div class="row">
                        <div class="col-lg-3 col-sm-2 col-3 left-mar">
                            <img src="images/<?php echo $row_product_sidebar['sanpham_img']?>" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                            <a href=""><?php echo $row_product_sidebar['sanpham_name'] ?></a>
                            <a href="" class="price-mar mt-2"><?php echo number_format($row_product_sidebar['sanpham_promotion']).' VND' ?></a>
                            <del><?php echo number_format($row_product_sidebar['sanpham_price']).' VND' ?><</del>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    
                </div>
            </div>
        </div>
        <!-- //best seller -->
    </div>
    <!-- //product right -->
</div>