<? 
	include $_SERVER['DOCUMENT_ROOT']."/inc/header.php";	
	include $_SERVER['DOCUMENT_ROOT']."/config/config.php";	
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if( !$_POST['comName'] || !$_POST['resName'] ||
			!$_POST['resPhone'] || !$_POST['resFax'] ||
			!$_POST['resEmail'] || !$_POST['tagOwner'] ||
			!$_POST['tagComNum'] || !$_POST['tagComAddr'] )
		{
			alert("파라미터 오류입니다.", "");
			exit();
		}
		

		$result = $mysqli->query("INSERT INTO hd_delivery SET 
			dlComName='".$_POST["comName"]."', 
			dlResName='".$_POST["resName"]."', 
			dlResPhone='".$_POST["resPhone"]."', 
			dlResFax='".$_POST["resFax"]."', 
			dlResEmail='".$Data["resEmail"]."', 
			dlResHome='".str_replace("http:''//", "", $_POST["resHome"])."', 
			dlTagOwner='".$_POST["tagOwner"]."', 
			dlTagComNum='".$_POST["tagComNum"]."', 
			dlTagComStaffNum='".$_POST["tagComStaffNum"]."', 
			dlTagComAddr='".$_POST["tagComAddr"]."', 
			dlTagComGoods='".$_POST["tagComGoods"]."', 
			dlTagComPartner='".$_POST["tagComPartner"]."', 
			dlTagComSales='".$_POST["tagComSales"]."', 
			dlTagComOperation='".$_POST["tagOperation"]."', 
			dlTagEtcMemo='".$_POST["tagEtcMemo"]."', 
			dlOfferOperation='".$_POST["offerOperation"]."', 
			dlOfferPartner='".$_POST["offerPartner"]."', 
			dlOfferRelation='".$_POST["offerRelation"]."', 
			dlOfferComName1='".$_POST["offerComName1"]."', 
			dlOfferComRelation1='".$_POST["offerComRelation1"]."', 
			dlOfferComName2='".$_POST["offerComName2"]."', 
			dlOfferComRelation2='".$_POST["offerComRelation2"]."', 
			regDate=now()");

		if(!$result)
		{
			alert("네트워크 오류로 등록에 실패하였습니다.", "/sub/deliveryhire.php");
			exit();
		}

		@$result->close;
		@$mysqli->close;

		alert("등록 완료되었습니다.", "/");
	}
?>

<script type="text/javascript">
	$(function()
	{
		var regNumber = /^[0-9]*$/;
		var emailReg = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

		$("#btn_ok").click(function()
		{
			if(!$("#comName").val().trim())
			{
				alert("업체명을 입력하세요.");
				$("#comName").focus();
				return false;
			}

			if(!$("#resName").val().trim())
			{
				alert("담당자를 입력하세요.");
				$("#resName").focus();
				return false;
			}

			if(!$("#resPhone").val().trim())
			{
				alert("연락처를 입력하세요.");
				$("#resPhone").focus();
				return false;
			}

			if(!regNumber.test($("#resPhone").val())) {
				alert('숫자만 입력해주세요.');
				$("#resPhone").focus();
				return false;
			}

			if(!$("#resFax").val().trim())
			{
				alert("팩스번호를 입력하세요.");
				$("#resFax").focus();
				return false;
			}

			if(!regNumber.test($("#resFax").val())) {
				alert('숫자만 입력해주세요.');
				$("#resFax").focus();
				return false;
			}

			if(!$("#resEmail").val().trim())
			{
				alert("이메일주소를 입력하세요.");
				$("#resEmail").focus();
				return false;
			}

			if(!emailReg.test($("#resEmail").val().trim()))
			{
				alert("잘못된 이메일 주소입니다.");
				$("#resEmail").focus();
				return false;
			}

			if(!$("#tagOwner").val().trim())
			{
				alert("대표자명을 입력하세요.");
				$("#tagOwner").focus();
				return false;
			}

			if(!$("#tagComNum").val().trim())
			{
				alert("사업자번호를 입력하세요.");
				$("#tagComNum").focus();
				return false;
			}

			if(!$("#tagComAddr").val().trim())
			{
				alert("사업장주소를 입력하세요.");
				$("#tagComAddr").focus();
				return false;
			}

			$("#deliveryForm").submit();

		});

		// 파일 선택시
		$("input[name=puImage]").change(function()
		{
			// 브라우저 확인
			var browser=navigator.appName;

			// 익스플로러일 경우
			if (browser=="Microsoft Internet Explorer")
			{
				var oas = new ActiveXObject("Scripting.FileSystemObject");
				fileSize = oas.getFile($("input[name=puImage]").val()).size;
			}
			// 익스플로러가 아닐경우
			else
			{
				fileSize = this.files[0].size;
			}

			$("#fSize").text(fileSize);
		});
	});
</script>
    <!-- 서브네비게이션 -->
    <section class="subVisualWrap">
        <div class="subVisual">
            <div class="visualTitle">
                <h2>납품제안</h2>
                <hr>
                <p>㈜아성과 함께 할 동반자를 기다리고 있습니다</p>
            </div>
        </div>
        <div class="subNavi">
            <div class="subNaviWrap delivery">
                <ul class="clearfix">
                    <li>
                        <a href="deliveryPartner.php">납품안내 <span>▼</span></a>
                        <ul>
                            <li><a href="companyIntro.php">회사소개</a></li>
                            <li><a href="businessModel.php">사업소개</a></li>
                            <li><a href="personnelSystem.php">인재채용</a></li>
                            <li><a href="managementSystem.php">윤리경영</a></li>
                            <!-- <li><a href="deliveryPartner.php">납품안내</a></li> -->
                            <li><a href="customerNotice.php">고객센터</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">납품제안 <span>▼</span></a>
                        <ul>
                            <li><a href="./deliveryPartner.php">전략적파트너쉽</a></li>
                            <li><a href="./deliveryQuality.php">품질불량관리</a></li>
                            <li><a href="./deliveryIntro.php">절차소개</a></li>
                            <!-- <li><a href="./deliveryhire.php">납품제안</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- 컨텐츠 -->
    <section>
        <div class="contentsTitleBox">
            <h2>납품제안</h2>
            <hr>
            <p>㈜아성과 함께 글로벌한 미래를 함께 하고자 하는 기업은<br/>업체 정보 및 상품 정보를 기입하여 주시면, 검토 후에 연락 드리도록 하겠습니다 </p>
        </div>
        <div class="contentsWrap">
            <div class="contents">
				<form name="deliveryForm" id="deliveryForm" method="post" enctype="multipart/form-data" action="<?=$PHP_SELF?>">
                <div class="tableStyle_06">
                    <h3 class="clearfix" >기본정보 <a href="#" class="blueBtn">납품상품양식 다운로드</a></h3>
                    <ul class="clearfix">
                        <li class="short">
                            <span>업체명</span>
                            <input class="short" type="text" name="comName" id="comName" placeholder="아성">
                        </li>
                        <li class="short">
                            <span>담당자</span>
                            <input class="short" type="text" name="resName" id="resName" placeholder="홍길동">
                        </li>
                        <li class="short">
                            <span>연락처</span>
                            <input class="short" type="text" name="resPhone" id="resPhone" placeholder="01012345678">
                        </li>
                        <li class="short">
                            <span>팩스</span>
                            <input class="short" type="text" name="resFax" id="resFax" placeholder="01012345678">
                        </li>
                        <li class="middle">
                            <span>이메일</span>
                            <input class="middle" type="text" name="resEmail" id="resEmail" placeholder="test@asunggroup.com">
                        </li>
                        <li class="middle">
                            <span>홈페이지</span>
                            <input class="middle" type="text" name="resHome" id="resHome" placeholder="asunggroup.com">
                        </li>
                    </ul>
                </div>


                <div class="tableStyle_06">
                    <h3>업체정보</h3>
                    <ul class="clearfix">
                        <li class="short">
                            <span>대표자명</span>
                            <input class="short" type="text" name="tagOwner" id="tagOwner" placeholder="이순신">
                        </li>
                        <li class="middle">
                            <span>사업자번호</span>
                            <input class="middle" type="text" name="tagComNum" id="tagComNum" placeholder="1234567890">
                        </li>
                        <li class="short">
                            <span>직원수</span>
                            <input class="short" type="text" name="tagComStaffNum" id="tagComStaffNum" placeholder="500">
                        </li>
                        <li class="middle">
                            <span>사업장주소</span>
                            <input class="middle" type="text" name="tagComAddr" id="tagComAddr" placeholder="서울 강남구 남부순환로 2748 (도곡동)">
                        </li>
                        <li class="middle">
                            <span>주요상품군</span>
                            <input class="middle" type="text" name="tagComGoods" id="tagComGoods" placeholder="여름">
                        </li>
                        <li class="middle">
                            <span>주요거래처</span>
                            <input class="middle" type="text" name="tagComPartner" id="tagCompartner" placeholder="">
                        </li>
                        <li class="middle">
                            <span>연매출</span>
                            <input class="middle" type="text" name="tagComSales" id="tagComSales" placeholder="0">
                        </li>
                        <li>
                            <span>운영형태</span>
                            <div class="box">
							<?
								foreach($operateArray as $key => $val)
								{
							?>
                                <div class="checks">
                                    <input type="radio" id="tagOperation" name="tagOperation" value="<?=$key?>"> 
                                    <label for="operation"><?=$val?></label> 
                                </div>
							<?
								}
							?>
                                <input class="middle" type="text" name="tagEtcMemo" id="tagEtcMemo">
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="tableStyle_06 plus">
                    <h3>제안정보</h3>
                    <ul class="clearfix">
                        <li>
                            <span>운영형태</span>
                            <div class="box">
							<?
								foreach($operateArray as $key => $val)
								{
							?>
                                <div class="checks">
                                    <input type="radio" id="offerOperation" name="offerOperation" value="<?=$key?>"> 
                                    <label for="operation"><?=$val?></label> 
                                </div>
							<?
								}
							?>
                            </div>
                        </li>
                        <li>
                            <span>거래중인 협력업체</span>
                            <div class="box">
                                <input class="middle" type="text" name="offerPartner" id="offerPartner" placeholder="업체명">
                                <input class="middle" type="text" name="offerRelation" id="offerRelation" placeholder="관계">
                            </div>
                        </li>
                        <li>
                            <span>임직원</span>
                            <div class="box">
                                <ul>
                                    <li>
                                        <input class="middle" type="text" name="offerComName1" id="offerComName1" placeholder="업체명">
                                        <input class="middle" type="text" name="offerComRelation1" id="offerComRelation1" placeholder="관계">
                                    </li>
                                    <li>
                                        <input class="middle" type="text" name="offerComName2" id="offerComName2" placeholder="업체명">
                                        <input class="middle" type="text" name="offerComRelation2" id="offerComRelation2" placeholder="관계">
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- li>
                            <span>첨부파일</span>
                            <div class="box">
                                <a href="#none;" class="grayBtn" id="file">첨부파일</a>
                                <p><img src="../images/sub/uploadImg.png" alt=""> 이미지.jpg <span>1.2MB <span>X</span></span></p>
                            </div>
                        </li //-->
                    </ul>
                </div>
				</form>

                <div class="textCenter buttonBox">
                    <a href="#none;" class="blueBtn" id="btn_ok">제안하기</a>
                </div>
            </div>
        </div>
    </section>

<? include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"; ?>