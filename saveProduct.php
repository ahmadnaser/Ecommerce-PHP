<?php require_once './includes/dbcon.php'; 



$link=open_database_connection();

SaveData();

close_database_connection($link);



?>
<a href="<?php echo BASEURL;?>">Back to Page</a>
<?php
 function SaveData()
{
 global $link; 

echo $_POST['txt_title']."<br />";
echo $_POST['Status']."<br />";
echo $_POST['txt_description']."<br />";
echo $_POST['filebutton']."<br />";
echo $_POST['txt_price']."<br />";
echo $_POST['ishot']."<br />";

$sql="INSERT INTO `products`(`title`, `status`, `short_description`, `picture`, `price`, `is_hot`) VALUES "
." ('".$_POST['txt_title']."','".$_POST['Status']."','".$_POST['txt_description']."','".$_POST['filebutton']."','".$_POST['txt_price']."','".$_POST['ishot']."')";

$result = mysql_query($sql, $link);

echo $result;


  /* 

$sql="SELECT `ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count` FROM `wp_posts` ";

$result = mysql_query($sql, $link);

    $posts = array();
    while ($row = mysql_fetch_assoc($result)) {
        $posts[] = $row;
    }
    

    print_r( $posts );*/
}
?>




<?php

function GetData()
{

    global $link; 

$sql="SELECT `id`, `title`, `status`, `short_description`, `picture`, `price`, `is_hot`
FROM products";

$result = mysql_query($sql, $link);

    $posts = array();
    while ($row = mysql_fetch_assoc($result)) {
	
        $posts[] = $row;
    }
    

    //print_r( $posts );

	foreach( $posts as $post)
	{
	?>

	<div style="background:#ccc;width:700px;height:300px;margin:10px;">
	<img src="<?php echo $post['picture']; ?>" width="280" height="280" style="float:left;"/>
	<a href="#"><?php echo $post['title']; ?></a>
	</div>
	
	<?php
	}
	
	
	

}

?>


