<?php require_once './includes/dbcon.php'; 


echo  BASEURL."<br />";

echo CONDIR."<br />";

echo ROOTDIR."<br />";

$link=open_database_connection();

GetData();

close_database_connection($link);


?>

<?php
 function all_posts()
{
    global $link; 

$sql="SELECT `ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count` FROM `wp_posts` ";

$result = mysql_query($sql, $link);

    $posts = array();
    while ($row = mysql_fetch_assoc($result)) {
        $posts[] = $row;
    }
    

    print_r( $posts );
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


