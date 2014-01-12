<?php

define('BASEURL','http://localhost/ecommerce/');
define('CONDIR',dirname(__FILE__) . '\\');
define('ROOTDIR',realpath(CONDIR . '/..'). '\\');
$dbhost = 'localhost';
$dbusername = 'root';
$dbuserpassword = '';
$default_dbname = 'ecommerce';
$MYSQL_ERRNO = '';
$MYSQL_ERROR = '';
$link=null;
function db_connect($dbname) {
   global $dbhost, $dbusername, $dbuserpassword, $default_dbname,$link;
   global $MYSQL_ERRNO, $MYSQL_ERROR;

   $link = mysql_connect($dbhost, $dbusername, $dbuserpassword);
   if(!$link) {
      $MYSQL_ERRNO = 0;
      $MYSQL_ERROR = "Connection failed to the host $dbhost.";
      return 0;
   }
   else if(empty($dbname) && !mysql_select_db($default_dbname)) {
      $MYSQL_ERRNO = mysql_errno();
      $MYSQL_ERROR = mysql_error();
      return 0;
   }
   else if(!empty($dbname) && !mysql_select_db($dbname)) {
      $MYSQL_ERRNO = mysql_errno();
      $MYSQL_ERROR = mysql_error();
      return 0;
   }
   else return $link;
}

function sql_error() {
   global $MYSQL_ERRNO, $MYSQL_ERROR;

   if(empty($MYSQL_ERROR)) {
      $MYSQL_ERRNO = mysql_errno();
      $MYSQL_ERROR = mysql_error();
   }
   return "$MYSQL_ERRNO: $MYSQL_ERROR";
}
function error_message($msg) {
   echo "Error: $msg";
   exit;
}








function open_database_connection()
{
   global $dbhost, $dbusername, $dbuserpassword, $default_dbname,$link;
   global $MYSQL_ERRNO, $MYSQL_ERROR;


    $link = mysql_connect($dbhost, $dbusername, $dbuserpassword) or die(mysql_error());
    mysql_select_db($default_dbname, $link) or die(mysql_error());

    return $link;
}

function close_database_connection($link)
{
   global $dbhost, $dbusername, $dbuserpassword, $default_dbname,$link;
   global $MYSQL_ERRNO, $MYSQL_ERROR;
    mysql_close($link);
}

 function get_all_posts()
{
    global $link; 

$sql="SELECT `ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count` FROM `wp_posts` ";

$result = mysql_query($sql, $link);

    $posts = array();
    while ($row = mysql_fetch_assoc($result)) {
        $posts[] = $row;
    }
    

    return $posts;
}



function web_service_call()
{

 global $link; 
$format = 'json';
$sql="SELECT `ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count` FROM `wp_posts` ";


	
$result = mysql_query($sql, $link) or die('Error query:  '.$query);
	/* create one master array of the records */
	$posts = array();
	if(mysql_num_rows($result)) {
		while($post = mysql_fetch_assoc($result)) {
			$posts[] = array('posts'=>$post);
		}
	}

	/* output in necessary format */
	if($format == 'json') {
		header('Content-type: application/json');
		echo json_encode(array('posts'=>$posts));
	}

}












?>