<?php
SESSION_START();

if($_SESSION['admin']==""){

  ?>
  <script type="text/javascript">
    window.location="admin_login.php";
  </script>
  <?php
}
 ?>
 <?php
 $link=mysqli_connect("localhost","root","");
 mysqli_select_db($link,"login_database");
 ?>


<?php
include 'header.php';
include 'menu.php';


  ?>
                <div class="grid_10">
            <div class="box round first">
                <h2>
                    Product Sales</h2>
                <div class="block">
                 <form name="form1" action="" method="post" enctype="multipart/form-data" >
                    <table>
                      <tr>
                        <td>Product Name</td>
                        <td><input type="text" name=pname></td>
                      </tr>

                      <tr>
                        <td>Product Price</td>
                        <td><input type="text" name=pprice></td>
                      </tr>

                      <tr>
                        <td>Product Quantity</td>
                        <td><input type="text" name=pqty></td>
                      </tr>


                      <tr>
                        <td>Product Image </td>
                        <td><input type="file" name=pimage></td>
                      </tr>

                      <tr>
                        <td>Product Category</td>
                        <td>
                        <select  name="pcategory">
                          <option value="Gents_Clothes">Gents-Clothes</option>
                          <option value="Ladies_Clothes">Ladies-Clothes</option>
                          <option value="Gents_shoes">Gents-shoes</option>
                          <option value="Ladies_shoes">Ladies-shoes</option>
                        </select>
                        </td>

                      </tr>
                      <tr>
                        <td>Product Descrption</td>
                        <td><textarea cols="15" rows="10" name="pdesc"></textarea></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center">
                          <input type="submit" name="pdetails_submit" value="Upload">
                        </td>
                      </tr>

                 </form>

<?php
$v1=rand(1111,9999);
$v2=rand(1111,9999);
$v3=$v1.$v2;
$v3=md5($v3);
if(isset($_POST['pdetails_submit'])){
$fnm=$_FILES["pimage"]["name"];
$dst="./product_image/".$v3.$fnm;
$dst1="product_image/".$v3.$fnm;
move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
mysqli_query($link,"
INSERT into product_details
values('','$_POST[pname]',$_POST[pprice],$_POST[pqty],'$dst1','$_POST[pcategory]','$_POST[pdesc]')"
);


}

 ?>

                </div>
            </div>


<?php
include 'footer.php';
 ?>
