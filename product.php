<!DOCTYPE html>
<html lang="en">
<?php 
require_once("include/header.php");
require_once("include/inc.php");
?>

    <body>
        <?php 
        if(isset($_SESSION['userrole'])){
            if($_SESSION['userrole'] == 'Admin' || $_SESSION['userrole'] == 'Employee'){ 

            include("include/menubar.php");
            include("include/form/product_description.php");
            include("include/dialog_delete.php");
            include("include/form/edit_product.php");
            include("include/form/add_product.php");
        ?>
            <div id="wrap">
                <div id="main">
                    <div class="ui container pad-segment">
                        <div class="ui grid">

                            <div class="three wide column">
                                <?php include_once("include/sidebar_config.php"); ?>
                            </div>
                            <div class="thirteen wide column">

                                <div class="ui segment">
                                    <h1><i class='shop icon'></i>Product</h1>
                                    <div class="ui divider"></div>

                                    <div class="ui mall primary labeled icon button" id="add-new-product-button">
                                        <i class="plus icon"></i> Add&nbsp;Product
                                    </div>

                                    <table class="ui compact celled table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Picture</th>
                                                <th>ProductName</th>
                                                <th>Type</th>
                                                <th>$/Unit</th>
                                                <th>Amount</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    $result = query("SELECT * FROM product ORDER BY ProdID DESC");
                                    confirm($result);
                                    
                                    while($row = fetch_array($result)){
                                    $product = <<<EOD
                                    <tr>
                                        <td>{$row['ProdID']}</td>
                                        <td><img class="ui tiny image" src="{$row['ProdPicture']}"></td>
                                        <td>{$row['ProdName']}</td>
                                        <td>{$row['ProdType']}</td>
                                        <td class="right aligned">{$row['ProdPricePerUnit']}.00</td>
                                        <td class="right aligned">{$row['ProdAmount']}</td>
                                        <td class="center aligned">
                                            <button class="ui icon button Preview-Product" value="{$row['ProdID']}"><i class="newspaper icon"></i></button>
                                            <button class="ui icon button Edit-Product" value="{$row['ProdID']}"><i class="write icon"></i></button>
                                            <button class="ui icon red button Delete-Product" value="{$row['ProdID']}"><i class="trash outline icon"></i></button>
                                        </td>
                                    </tr>
EOD;
                                    echo $product;
                                    }
                                    
                                    $count_prod = row_count($result);
                                    ?>
                                        </tbody>
                                        <tfoot class="full-width">
                                            <tr>
                                                <th colspan="8">
                                                    <h2>Total: <?php echo $count_prod ?> item</h2>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="js/editstore.js"></script>
            <?php include_once('include/footer.php'); ?>
                <?php 
                    }
                }
                else{
                    echo "<h1>Permission Denied</h1>";
                    die();
                }
                ?>
    </body>

</html>