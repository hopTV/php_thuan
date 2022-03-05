 
    <?php
        $category = mysqli_query($con,'select * from category order by category_id asc');

    ?>
    <div class="navbar-inner">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="agileits-navi_search">
                    <form action="#" method="post">
                        <select id="agileinfo-nav_search" name="agileinfo_search" class="border" required="">
							<option value="">Danh Mục Sản Phẩm</option>
                            <?php
                                while($row = mysqli_fetch_array($category)) {

                               
                            ?>
							<option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                            <?php
                                 }
                            ?>
						</select>
                    </form>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto text-center mr-xl-5">
                        <li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link" href="index.php">Trang Chủ
								<span class="sr-only">(current)</span>
							</a>
                        </li>
                        <?php
                            $cate = mysqli_query($con,'select * from category order by category_id asc');
                            while($row_cate = mysqli_fetch_array($cate)) {

                           
                        ?>
                        <li class="nav-item  mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link " href="?quanly=danhmuc&id=<?php echo $row_cate['category_id'] ?>" role="button" aria-haspopup="true" aria-expanded="false">
								<?php echo $row_cate['category_name'] ?>
							</a>
                         
                        </li>
                        <?php
                            }
                        ?>
                        
                        
                       
                       
                        <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link" href="product.html">Tin Tức</a>
                        </li>
                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Trang
							</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="product.html">Sản Phẩm Mới</a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="single.html">Kiểm Tra Hàng</a>
                                <a class="dropdown-item" href="single2.html">Thanh Toán</a>
                                
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Liên Hệ</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- //navigation -->