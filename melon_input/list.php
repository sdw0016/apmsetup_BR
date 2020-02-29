<? 
	session_start(); 
	$table = "product";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset='utf-8'>
<link href="../melon_css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../melon_css/concert.css" rel="stylesheet" type="text/css" media="all">
</head>
<?
	include "../melon_lib/dbconn.php";
	$scale=10;			// 한 화면에 표시되는 글 수

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>
<body>
<div id="wrap">
  <div id="header">
    <? include "../melon_lib/top_login2.php"; ?>
  </div>  <!-- end of header -->

  <div id="menu">

  </div>  <!-- end of menu --> 

  <div id="content">
	<div id="col1">
		<div id="left_menu">
<?

?>
		</div>
	</div>
	<div id="col2">    

		<div id="title"></div>

		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		<div id="list_search">
		<div id="list_search1">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다.  </div>
		<div id="list_search2"><img src="../melon_img/select_search.gif"></div>
		<div id="list_search3">
		<select name="find"></select></div>
		<div id="list_search4"><input type="text" name="search"></div>
		<div id="list_search5"><input type="image" src="../melon_img/list_search_button.gif"></div>
		</div>
		</form>

		<table border="1" cellpadding="5">
		<tr align="center">
		<?		
		   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                 
		   {
		      mysql_data_seek($result, $i);       
		      // 가져올 레코드로 위치(포인터) 이동  
		      $row = mysql_fetch_array($result);       
		      // 하나의 레코드 가져오기
			$item_num[0]     = $row[num];
			$image_name[0]   = $row[file_name_0];
			$image_copied[0] = $row[file_copied_0];
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name;
		?>
		    <td align="center">
		  	<?
				
					
				echo "<img src='$img_name' align='center' width='90' height='90' alt='오류' />";
			?>
			</td>
			
		  	<?
	   	  	$number--;
	  		}
			?>
			</tr>
			<tr>
			<?		
		   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                 
		   {		      
		   	mysql_data_seek($result, $i);       
		      // 가져올 레코드로 위치(포인터) 이동  
		    $row = mysql_fetch_array($result);       
		      // 하나의 레코드 가져오기
			$item_num     = $row[num];

			$item_date = substr($item_date, 0, 10);  
			$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
			?>

			<td>
		   <div id="list_item">
		  <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?>
		  </a> </div>
			</td>

			<?
	   	  	$number--;
	  		}
			?>
</tr>
			
		</table>
		</div>
		</form>

		<div class="clear"></div>

		<div id="list_content">

			<div id="list_item">
				<div id="list_item1"></div>
				<div id="list_item4"></div>
			</div>
			<div id="page_button">
				<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?table=$table&page=$i'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				</div>
				<div id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../melon_img/list.png"></a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="input.php?table=<?=$table?>"><img src="../melon_img/write.png"></a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
