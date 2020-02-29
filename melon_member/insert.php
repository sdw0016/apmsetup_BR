<meta charset='utf-8'>
<?
   $phone = $phone1."-".$phone2."-".$phone3;
   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
   $ip = $REMOTE_ADDR;         // 방문자의 IP 주소를 저장
   $birth=$year."/".$month."/".$day;
   include "../melon_lib/dbconn.php";       // dconn.php 파일을 불러옴

   $sql = "select * from member where id='$id'";
   $result = mysql_query($sql, $connect);
   $exist_id = mysql_num_rows($result);

   if($exist_id) {
     echo("
           <script>
             window.alert('해당 아이디가 존재합니다.')
             history.go(-1)
           </script>
         ");
         exit;
   }
   else
   {            // 레코드 삽입 명령을 $sql에 입력
      $sql = "insert into member(name, id, passwd, birth, gender, phone, regist_day) ";
    $sql .= "values('$name', '$id', '$passwd', '$birth','$gender' ,'$phone', '$regist_day')";

    mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
   }

   mysql_close();                // DB 연결 끊기
   echo "
     <script>
      location.href = './melon.php';
     </script>
  ";
?>

   
