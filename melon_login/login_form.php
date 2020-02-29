<? session_start(); ?>
<html>
<head> 
<meta charset='utf-8'>
<link href="../melon_css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../melon_css/member.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>

<div id="wrap">
  <div id="header">
    <? include "../melon_lib/top_login2.php"; ?>
  </div>  <!-- end of header -->
<div id="content">
  <hr>
<div id="col2">
<h2>▶ 로그인</h2>
        <form  name="member_form" method="post" action="login.php"> 

       
		<div id="login_form">
		     <img id="login_msg" src="../melon_img/login_msg.gif">
			 <div class="clear"></div>

			 <div id="login1">
				<img src="../melon_img/login_key.gif">
			 </div>
			 <div id="login2">
				<div id="id_input_button">
					<div id="id_pw_title">
						<ul>
						<li><img src="../melon_img/id_title.gif"></li>
						<li><img src="../melon_img/pw_title.gif"></li>
						</ul>
					</div>
					<div id="id_pw_input">
						<ul>
						<li><input type="text" name="id" class="login_input"></li>
						<li><input type="password" name="pass" class="login_input"></li>
						</ul>						
					</div>
					<div id="login_button">
						<input type="image" src="../melon_img/login_button.gif">
					</div>
				</div>
				<div class="clear"></div>

				<div id="login_line"></div>
				<div id="join_button"><img src="../melon_img/no_join.gif">&nbsp;&nbsp;&nbsp;&nbsp;<a href="../melon_main/melon_main.php"><img src="../melon_img/join_button.gif"></a></div>
			 </div>			 
		</div> <!-- end of form_login -->

	    </form>
	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>