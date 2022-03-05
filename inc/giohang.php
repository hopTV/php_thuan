<?php
    if(isset($_POST['submit'])) {
        $tensp = $_POST['tensanpham'];
        $sanphamid = $_POST['sanphamid'];
        $gia = $_POST['price'];
        $soluong = $_POST['soluong'];
        $img = $_POST['img'];
        $sql_select_Cart = mysqli_query($con,'select * from cart where product_id = '.$sanphamid.'');
        $count = mysqli_num_rows($sql_select_Cart);
        if($count > 0) {
            $row_sp = mysqli_fetch_array($sql_select_Cart);
            $soluong = $row_sp['product_quantity'] + 1;
            $sql_cart = 'update cart set product_quantity = '.$soluong.' where product_id = '.$sanphamid.'';
        }else {
            $soluong = $soluong;
            $sql_cart = mysqli_query($con,"insert into cart(product_id,product_name,product_img,product_quantity,product_price)
        values ('$sanphamid','$tensp','$img','$soluong','$gia') ");
        }
        $insert_Cart = mysqli_query($con,$sql_cart);
    }elseif(isset($_POST['capnhat'])) {
        for($i=0;$i<count($_POST['product_id']);$i++) {
            $pro_id = $_POST['product_id'][$i];
            $soluong = $_POST['soluong'][$i];
            $sql_update = mysqli_query($con,"update cart set product_quantity='$soluong' where product_id='$pro_id'");
        }
    }elseif(isset($_GET['xoa'])) {
        $id = $_GET['xoa'];
        $sql_delete = mysqli_query($con,'delete from cart where cart_id='.$id.'');
        
        
    }elseif(isset($_POST['thanhtoan'])) { 
        
        $name = $_POST['name'];
        
        $phone = $_POST['phone'];
        
        $address = $_POST['address'];
        $note = $_POST['note'];
        $email = $_POST['email'];
        $giaohang = $_POST['giaohang'];
       
        $sql_khachhang = mysqli_query($con,"insert into khach_hang(name,phone,email,address,note,giaohang) values ('$name','$phone','$email','$address','$note','$giaohang')");
        if($sql_khachhang) {
            $sql_select = mysqli_query($con,"select * from khach_hang order by id desc limit 1");
            $mahang = rand(0,999);
            $row_kh = mysqli_fetch_array($sql_select);
            $khachhang_id = $row_kh['id'];
            for($i=0;$i<count($_POST['thanhtoan_id']);$i++) {
               
                $thanhtoan_id = $_POST['thanhtoan_id'][$i];
                $thanhtoan_sl = $_POST['thanhtoan_sl'][$i];
                $sql_order = mysqli_query($con,"insert into don_hang(sanpham_id,mahang,khachhang_id,soluong) 
                values ('$thanhtoan_id','$mahang','$khachhang_id','$thanhtoan_sl')");
            }
        }
    }

?>

<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>C</span>heckout
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">
           <?php
                $get_cart = mysqli_query($con,'select * from cart order by cart_id desc');
           ?>
            <div class="table-responsive">
                <form action="" method="post">
                    <table class="timetable_sub">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình Ảnh</th>
                                <th>Số Lượng</th>
                                <th>sản phẩm</th>

                                <th>Giá</th>
                                <th>Giá Tổng</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dem = 0;
                            $total = 0;
                                while($row_cart = mysqli_fetch_array($get_cart)) {
                                    $subtotal = $row_cart['product_quantity'] * $row_cart['product_price'];
                            $dem++;
                            $total += $subtotal;
                            ?>
                            <tr class="rem1">
                                <td class="invert"><?php echo $dem; ?></td>
                                <td class="invert-image">
                                    <a href="?quanly=chitietsp&id=<?php echo $row_cart['product_id'] ?>">
                                        <img src="images/<?php echo $row_cart['product_img'] ?>" alt=" " class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                <input type="number" name="soluong[]" min="1" value="<?php echo $row_cart['product_quantity'] ?>">
                                <input type="hidden" name="product_id[]" value="<?php echo $row_cart['product_id'] ?>">
                                </td>
                                <td class="invert"><?php echo $row_cart['product_name'] ?></td>
                                <td class="invert"><?php echo number_format($row_cart['product_price'])?></td>
                                <td class="invert"><?php echo number_format($subtotal)?></td>
                                <td class="invert">
                                    <a href="?quanly=giohang&xoa=<?php echo $row_cart['cart_id'] ?>"> xóa </a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                            <tr class="rem1">
                                <td class="invert" colspan="7">Tổng Tiền: <?php echo number_format($total).' VND' ?> </td>
                            </tr>
                            <tr class="rem1">
                                <td class="invert" colspan="7">
                                    <input type="submit" class="btn btn-success" value="cập nhật giỏ hàng" name="capnhat">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <div class="checkout-left">
            <div class="address_form_agile mt-sm-5 mt-4">
                <h4 class="mb-sm-4 mb-3">thêm địa chỉ giao hàng</h4>
                <form action="" method="post" class="creditly-card-form agileinfo_form">
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="controls form-group">
                                    <input class="billing-address-name form-control" type="text" name="name" placeholder="Full Name" required="">
                                </div>
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left form-group">
                                        <div class="controls">
                                            <input type="text" class="form-control" placeholder="Mobile Number" name="phone" required="">
                                        </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right form-group">
                                        <div class="controls">
                                            <input type="text" class="form-control" placeholder="address" name="address" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="controls form-group">
                                    <input type="text" style="resize: none;" class="form-control" placeholder="email" name="email" required="">
                                </div>
                                <div class="controls form-group">
                                    <textarea name="note" rows="2" class="form-control" placeholder="ghi chú" ></textarea>
                                </div>
                                <div class="controls form-group">
                                    <select class="option-w3ls" name="giaohang">
                                        <option>hình thức giao hàng</option>
                                        <option value="1">nhận tiền khi giao hàng</option>
                                        <option value="2">qua banking</option>
                                        

                                    </select>
                                </div>
                                <?php
                                    $sql_get_cart = mysqli_query($con,'select * from cart order by cart_id desc');
                                    while($row_get_cart = mysqli_fetch_array($sql_get_cart)) {
                                        
                                    
                                ?>
                                <input type="hidden" name="thantoan_id[]" value="<?php echo $row_get_cart['product_id'] ?>">
                                <input type="hidden" name="thantoan_sl[]" value="<?php echo $row_get_cart['product_quantity'] ?>">
                                <?php
                                    }
                                ?>
                            </div>
                            <input type="submit" name="thanhtoan" class="btn btn-success" value="thanh toán" style="width: 20%">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //checkout page -->