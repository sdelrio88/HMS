<?php

// include function files for this application
require_once('bookmark_fns.php');
session_start();

  $username = $_POST['username'];
  $passwd = $_POST['passwd'];
if( !isset($username) && !isset($passwd) ){
  //Post array is not filled, meaning we came from the link in the registration page
  //Therefore, grab the user's info from the session array
  $username = $_SESSION['valid_user'];
  $passwd = $_SESSION['pw'];
}
else{
  //Post array is filled out, meaning we came from the login page and user is attempting to log in
  $username = $_POST['username'];
  $passwd = $_POST['passwd'];
}


if ($username && $passwd) {
// they have just tried logging in
  try  {
    login($username, $passwd);
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
  }
  catch(Exception $e)  {
    // unsuccessful login
    do_html_header('Problem:');
    echo 'You could not be logged in.
          You must be logged in to view this page.';
    do_html_url('login.php', 'Login');
    do_html_footer();
    exit;
  }
}

do_html_header('Home');
check_valid_user();
// get the bookmarks this user has saved
if ($url_array = get_user_urls($_SESSION['valid_user'])) {
  display_user_urls($url_array);
}

// give menu of options
display_user_menu();

do_html_footer();
?>
