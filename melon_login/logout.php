<?
  session_start();
  unset($_SESSION['userid']);
  unset($_SESSION['username']);


  echo("
       <script>
          location.href = '../melon_main/melon_main.php'; 
         </script>
       ");
?>
