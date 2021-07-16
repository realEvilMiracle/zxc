<?php

    if (isset($_POST['submit'])){

        foreach($_POST['quantity'] as $key => $val){
            if($val==0){
                unset($_SESSION['cart']['$key']);
            }
            else{
                $_SESSION['cart'][$key]['quantity']=$val;
            }
        }
    }


?>

<h1>View cart</h1> 
<a href="zxc.php?page=products">Go back to products page</a> 
<form method="post" action="zxc.php?page=cart"> 
      
    <table> 
          
        <tr> 
            <th>Name</th> 
            <th>Quantity</th> 
            <th>Price</th> 
            <th>Items Price</th> 
        </tr> 
          
        <?php 
        //   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
          $link = mysqli_connect("localhost", "root", "", "zxc");
          mysqli_query($link, "SET NAMES utf8");
            $sql="SELECT * FROM spares WHERE id_zapchasti IN ("; 
                      
                    foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 
                    } 
                      
                    $sql=substr($sql, 0, -1).") ORDER BY id_zapchasti ASC"; 
                    $query=mysqli_query($link,$sql); 
                    $totalprice=0; 
                    while($row=mysqli_fetch_assoc($query)){ 
                        $subtotal=$_SESSION['cart'][$row['id_zapchasti']]['quantity']*$row['Price']; 
                        $totalprice+=$subtotal; 
                    ?> 
                        <tr> 
                            <td><?php echo $row['zapchast_name'] ?></td> 
                            <td><input type="text" name="quantity[<?php echo $row['id_zapchasti'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id_zapchasti']]['quantity'] ?>" /></td> 
                            <td><?php echo $row['Price'] ?>$</td> 
                            <td><?php echo $_SESSION['cart'][$row['id_zapchasti']]['quantity']*$row['Price'] ?>$</td> 
                        </tr> 
                    <?php 
                          
                    } 
        ?> 
                    <tr> 
                        <td colspan="4">Total Price: <?php echo $totalprice ?></td> 
                    </tr> 
          
    </table> 
    <br /> 
    <button type="submit" name="submit">Update Cart</button> 
</form> 
<br /> 
<p>To remove an item, set it's quantity to 0. </p>