<main class="catalog  mb ">

   <div class="boxleft">
      <div class="banner">
         <img id="banner" src="view/img/anh0.jpg" alt="">
         <button class="pre" onclick="pre()">&#10094;</button>
         <button class="next" onclick="next()">&#10095;</button>
      </div>

      <div class="items">
         <?php
         foreach ($spnew as $sp) {
            extract($sp);
            $hinh = $img_part . $img;
            $linksp = "index.php?act=sanphamct&idsp=" . $id;
            echo '
            <div class="box_items">
               <div class="box_items_img">
                  <a href="' . $linksp . '"><img src="' . $hinh . '" alt=""></a>
               </div>
                  <a class="item_name" href="' . $linksp . '">' . $name . '</a>
                  <p class="price">$' . $price . '</p>
                  <p class="mota">$' . $mota . '</p>
               <div class="row btnaddtocart">
                  <form action="index.php?act=addtocart" method="post">
                        <input type="hidden" name="id" value="' . $id . '">
                        <input type="hidden" name="name" value="' . $name . '">
                        <input type="hidden" name="img" value="' . $hinh . '">
                        <input type="hidden" name="price" value="' . $price . '">
                  </form>
               </div>
            </div>
            
               ';
         }
         ?>
      </div>
   </div>
   <div class="boxright">
      <?php include "boxright.php"; ?>
   </div>

</main>