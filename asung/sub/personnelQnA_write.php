<? 
	include $_SERVER['DOCUMENT_ROOT']."/inc/header.php";

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(!$_POST["name"] || !$_POST["email1"] || 
			!$_POST["email2"] || !$_POST["phone"] ||
			!$_POST["title"] || !$_POST["contents"]|| 
			!$_POST["passwd"])
		{
			alert("파라미터 오류입니다.", "");
			exit();
		}

		$email = $_POST["email1"]."@".$_POST["email2"];
		$pwd = hash("sha256", md5($_POST["passwd"]));

		$result = $mysqli->query("INSERT INTO hd_inquiry_job SET inName='".$_POST["name"]."', inEmail='".$email."', inPhone='".$_POST["phone"]."', inTitle='".$_POST["title"]."', inControllType='".$_POST["ctype"]."', inContents='".$_POST["contents"]."', inPassword='".$pwd."', regDate=now(), inAnserName='', inAnser=''");
		if(!$result)
		{
			alert("네트워크 오류로 등록에 실패하였습니다.", "./personnelQnA_write.php");
			exit();
		}

		@$result->close;
		@$mysqli->close;

		alert("등록 완료하였습니다.", "./personnelStep.php");
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
					<form name="personnelForm" id="personnelForm" method="post">
                    <div class="tableStyle_05">
                        <h3>채용 문의글 작성</h3>
                        <ul>
                           <li>
                               <span>이름</span>
                               <input type="text" name="name" id="name">
                           </li>
                           <li>
                                <span>이메일</span>
                                <input type="text" name="email1" id="email1">
                                <select name="email2" id="email2" class="email">
                                    <option value="naver.com">naver.com</option>
                                </select>
                           </li>
                           <li>
                                <span>연락처</span>
                                <input type="text" name="phone" id="phone">
                            </li>
                            <li>
                                <span>희망분야</span>
                                <select name="ctype" id="ctype">
                                    <option value="design">디자인</option>
                                </select>
                            </li>
                            <li>
                                <span>제목</span>
                                <input type="text" name="title" id="title" class="long">
                            </li>
                            <li>
                                <span>문의내용</span>
                                <textarea name="contents" id="contents" cols="30" rows="10"></textarea>
                            </li>
                            <li>
                                <span>비밀번호</span>
                                <input type="password" name="passwd" id="passwd" class="long">
                            </li>
                            <!-- li>
                                <span>자동입력방지</span>
                                <input type="text" class="long">
                            </li //-->
                            <li>
                                <span>개인정보 수집,이용 동의</span>
                                <div>
                                    <textarea name="" id="" cols="30" rows="10">
㈜아성(이하 “회사”라 함)는 정보통신망이용촉진및정보보호등에관한법률, 개인정보보호법 등 개인정보와 관련된 
법령상의 규정들을 준수하고있으며, 개인정보취급방침을 제정하여 이용자의 권익보호에 최선을 다하고 있습니다.
                                    </textarea>
                                    <div><input type="checkbox" name="check" id="check"><label for="check">개인정보 수집, 이용에 동의합니다.</label></div>
                                </div>
                            </li>
                        </ul>
                        <div class="textCenter">
                            <a class="blueBtn">확인</a>
                        </div>
                    </div>
					</form>
                </div>

            </div>
        </div>
    </section>

<script type="text/javascript">
$(function() {

	var emailReg = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var reg = /^(\s|\d)+$/;

	$('.blueBtn').click(function() {

		if(!$("#name").val().trim())
		{
			alert("이름을 입력하세요.");
			$("#name").focus();
			return false;
		}

		if(!$("#email1").val().trim() || !$("#email2").val().trim())
		{
			alert("이메일을 입력하세요.");
			$("#email1").focus();
			return false;
		}

		var emailAddr = $("#email1").val() + '@' + $("#email2").val();

		if(!emailReg.test(emailAddr))
		{
			alert("잘못된 이메일 주소입니다.");
			$("#email1").focus();
			return false;
		}

		if(!$("#phone").val().trim())
		{
			alert("연락처를 입력하세요.");
			$("#phone").focus();
			return false;
		}

		if($("#phone").val().length < 11)
		{
			alert("잘못된 연락처입니다.");
			$("#phone").focus();
			return false;
		}

		if(!reg.test($('#phone').val().trim()))
		{
			alert("연락처는 숫자만 입력하세요.");
			$("#phone").focus();
			return false;
		}

		if(!$("#title").val().trim())
		{
			alert("제목을 입력하세요.");
			$("#title").focus();
			return false;
		}

		if(!$("#contents").val().trim())
		{
			alert("내용을 입력하세요.");
			$("#contents").focus();
			return false;
		}

		if(!$("#passwd").val().trim())
		{
			alert("비밀번호를 입력하세요.");
			$("#passwd").focus();
			return false;
		}

		if(!$('#check').prop("checked"))
		{
			alert("개인정보 수집,이용에 동의하세요.");
			$("#check").focus();
			return false;
		};

		$('form#personnelForm').submit();

	});
});
</script>

<? include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"; ?>