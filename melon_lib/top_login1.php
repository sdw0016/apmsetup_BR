<meta charset="euc-kr">
    <div id="logo"><a href="../melon_main/melon_main.php"><img src="../melon_img/BRmark.gif" border="0"></a></div>
	<div id="moto"><img src="../melon_img/brlogo.gif"></div>
	<div id="top_login">
<?
    if(!$userid)
	{
?>
          <a href="../melon_login/login_form.php">로그인</a> | <a href="../melon_member/melon.php">회원가입</a>
<?
	}
	else
	{
?>

		<a href="../melon_login/logout.php">로그아웃</a> | <a href="../melon_login/member_form_modify.php">정보수정</a>
<?
	}
?>
	 </div>
