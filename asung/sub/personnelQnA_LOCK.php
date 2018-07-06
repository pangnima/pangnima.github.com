<? 
	include $_SERVER['DOCUMENT_ROOT']."/inc/header.php";

	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if( !$_POST['idx'] || !$_POST['passwd'] )
		{
			alert("파라미터 오류입니다.", "");
			exit();
		}

		$pwd = hash("sha256", md5($_POST["passwd"]));
		$result = $mysqli->query("SELECT inPassword FROM hd_inquiry_job WHERE idx='".$_POST['idx']."'");
		$row = $result->fetch_assoc();

		@$result->close;
		@$mysqli->close;

		if( $row['inPassword'] == $pwd ) 
		{
			$_SESSION['qna'] = $_POST['idx'];
			echo "<script type='text/javascript'>
					location.href='./personnelQnA_read_modify.php?idx=".$_POST['idx']."';
				  </script>";
			exit();
		}

	}
	else
	{
		session_destroy(); 
	}

?>

    <!-- 서브네비게이션 -->
    <section class="subVisualWrap">
        <div class="subVisual company">
            <div class="visualTitle">
                <h2채용문의</h2>
                <hr>
                <p>㈜아성은 창의적인 사고와 도전적인 정신을 가지고 있는 인재를 기다립니다</p>
            </div>
        </div>
        <div class="subNavi">
            <div class="subNaviWrap">
                <ul class="clearfix">
                    <li>  
                        <a href="#">인재채용 <span>▼</span></a>
                    </li>
                    <li>
                        <a href="#">채용문의 <span>▼</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- 컨텐츠 -->
    <section>
        <div class="contentsTitleBox">
            <h2>채용문의</h2>
        </div>
        <div class="contentsWrap person">
            <div class="contents personStep">
                <ul class="selector clearfix">
                    <li>채용절차</li>
                    <li>채용공고</li>
                    <li class="on">채용,문의</li>
                </ul>

                <div>
								<form name="qnaForm" id="qnaForm" method="post">
								<input type="hidden" name="idx" id="idx" value="<?=$_GET['idx']?>">
                    <div class="tableStyle_03">
                        <ul>
                            <li class="tableHead">
                                문의드립니다
                            </li>
                            <li>
                                <div>
                                    <h2>비밀글</h2>
                                    <p>비밀번호를 입력해주세요</p>
                                    <input type="password" name="passwd" id="passwd">
                                    <ul class="clearfix">
                                        <li><a href="#none;" onClick="history.go(-1);">이번으로 돌아가기</a></li>
                                        <li class="ok"><a id="btnOk">확인</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
								</form>
                </div>

            </div>
        </div>
    </section>

<script type="text/javascript">
$(function() {
	$('#btnOk').click(function() {
		if(!$('#passwd').val())
		{
			alert('비밀번호를 입력하세요.');
			$('#passwd').focus();
			return false;
		}

		$('form#qnaForm').submit();
	});
});
</script>

<? include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"; ?>