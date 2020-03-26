<?php
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
    echo 'You have succesfully logged in. Welcome '.$_SESSION['username'];
  }
  else {
    echo 'You have not provided valid login credentials. Welcome Guest';
  }
?>

<ul>
    <li><a href=<?php echo site_url('example/first'); ?>>first page</a></li>
    <li><a href=<?php echo site_url('example/second'); ?>>second page</a></li>
    <li><a href=<?php echo site_url('example'); ?>>log out</a></li>
</ul>
