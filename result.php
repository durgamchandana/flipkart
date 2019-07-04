


<?php
session_start();

include_once("flipkartclass.php");


// Get affiliateID and token from https://affiliate.flipkart.com/
// Set flipkart affiliateID and token
$affiliateID = 'yuganshch';
$token = '34adf1305516462d8ce93de45594da81';
$fkObj = new flipkartclass($affiliateID, $token);

// fetch flipkart products
$queryobject=$_GET['search'];
$value=strval($queryobject);
$final = str_replace(" ", "+", $value);
echo $final;

// $output = $request->getParameter();
// echo $output;
$dotdJsonURL ='https://affiliate-api.flipkart.net/affiliate/1.0/search.json?query='.$final.'&resultCount=10'; 

$result = flipkartclass::getData($dotdJsonURL, 'json');
if(!$result) {
    	echo "<h3>There are no products, Or Error on flipkart api server please contact to flipkart affiliate team or Check your internet connection</h3>";
    }
?>



<title>FlipKart Affiliate API DEMO</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<style>

.glyphicon { margin-right:5px; }
.thumbnail
{
    margin-bottom: 20px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}

.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 10px;
}
.item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
{
    background: #428bca;
}

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
}
.item.list-group-item .caption
{
    padding: 9px 9px 0px 9px;
}
.item.list-group-item:nth-of-type(odd)
{
    background: #eeeeee;
}

.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}

.item.list-group-item img
{
    float: left;
}
.item.list-group-item:after
{
    clear: both;
}
.list-group-item-text
{
    margin: 0 0 11px;
}
#innerbox
{
    height:520px;
    max-height: 520px;
   
   display: inline-block;
}

</style>

<div class="container">
<h1 style="text-align:center">FlipKart Affiliate API </h1>
    <div id="products" class="row list-group">

    <?php foreach($result['products'] as $resultSet) { 
  

?>
        <div class="item col-sm-6 col-md-3" >
            <div class="thumbnail" id="innerbox" style="overflow-y:scroll">
                <img class="group list-group-image" src="<?= $resultSet['productBaseInfoV1']['imageUrls']['400x400']; ?>" alt="" style="height:200px; width:200px;" />
                <div class="caption" >
                    <h4 class="group inner list-group-item-heading">
                        <?= $resultSet['productBaseInfoV1']['title']; ?></h4>
                         Max Retail Price:<h4 class="group inner list-group-item-heading">
                        <?= $resultSet['productBaseInfoV1']['maximumRetailPrice']['amount']; ?></h4>
                         Our Special Price:<h4 class="group inner list-group-item-heading">
                        <?= $resultSet['productBaseInfoV1']['flipkartSpecialPrice']['amount']; ?></h4>
                     <div class="row">
                       
                        <div class="col-xs-12 col-md-12">
                            <a class="btn btn-lg btn-success deal" target="_blank" style="width:100%" rel="nofollow, noindex" href="<?= $resultSet['productBaseInfoV1']['productUrl']; ?>"><b>GOTO FLIPKART</b></a>
                        </div>
                    </div>    
                     Description: 
                    <p class="group inner list-group-item-text" >
                       

                      <?= $resultSet['productBaseInfoV1']['productDescription']; ?></p>
                    
                   
                </div>
            </div>
        </div>
<?php   } ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
