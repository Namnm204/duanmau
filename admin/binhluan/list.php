<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH BÌNH LUẬN</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=listdm" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>ID TÀI KHOẢN</th>
                        <th>ID SẢN PHẨM</th>
                        <th>NGÀY BÌNH LUẬN</th>
                        <th>NỘI DUNG</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listbinhluan as $binhluan) {
                        extract($binhluan);
                        $suabl = "index.php?act=suabl&id=" . $id;
                        $xoabl = "index.php?act=xoabl&id=" . $id;
                        echo '
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>' . $id . '</td>
                            <td>' . $iduser . '</td>
                            <td>' . $idpro . '</td>
                            <td>' . $ngaybinhluan . '</td>
                            <td>' . $noidung . '</td>
                            <td><a href="' . $suabl . '"><input type="button" value="Sửa"></a> 
                            <a href="' . $xoabl . '"><input type="button" value="Xóa"></td></a>
                        </tr>
                    ';
                    }
                    ?>




                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?act=adddm"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>