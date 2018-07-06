<? include $_SERVER['DOCUMENT_ROOT']."/inc/header.php"; 

	if( !$_GET['idx'] )
	{
		echo "<script type='text/javascript'>
				alert('잘못된 접근입니다.');
				location.href='./custommerNotice.php';
			  </script>";
		exit();
	}

	$result = $mysqli->query("SELECT * FROM hd_notice WHERE idx='".$_GET['idx']."'");
	$row = $result->fetch_assoc();

	@$result->close;
	@$mysqli->close;
?>

    <!-- 서브네비게이션 -->
    <section class="subVisualWrap customer">
        <div class="subVisual">
            <div class="visualTitle">
                <h2>공지사항</h2>
                <hr>
                <p>㈜아성의 새로운 소식들을 전해드립니다</p>
            </div>
        </div>
        <div class="subNavi">
            <div class="subNaviWrap">
                <ul class="clearfix">
                    <li>
                        <a href="customerNotice.php">고객센터 <span>▼</span></a>
                        <ul>
                            <li><a href="companyIntro.php">회사소개</a></li>
                            <li><a href="businessModel.php">사업소개</a></li>
                            <li><a href="personnelSystem.php">인재채용</a></li>
                            <li><a href="managementSystem.php">윤리경영</a></li>
                            <li><a href="deliveryPartner.php">납품안내</a></li>
                            <!-- <li><a href="customerNotice.php">고객센터</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="#">공지사항 <span>▼</span></a>
                        <ul>
                            <li><a href="./customerNotice.php">공지사항</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- 컨텐츠 -->
    <section>
        <div class="contentsTitleBox">
            <h2>공지사항</h2>
        </div>
        <div class="contentsWrap notice">
            <div class="contents">
                <ul class="noticeView">
                    <li class="title">
                        <h3><?=$row['noTitle']?></h3>
                        <span><?=$row['regDate']?></span>
                    </li>
                    <li>
                        <div class="imgBox">
                            <img src="/_data/korean/<?=$row['noFile']?>" alt="">
                        </div>
                        <div>
                            <?=$row['noContents']?>
                        </div>
                    </li>
                    <!-- li class="prevView moveView">
                        <a href="#">
                            <span class="moveText">이전글 ▲</span><span class="title">[공지사항] 혜인, 다이소·동원산업과 물류장비 렌탈 계약…"사업 다각화 일환"</span><span class="day">2018-02-01</span>
                        </a>
                    </li>
                    <li class="nextView moveView">
                        <a href="#">
                            <span class="moveText borderBottomNone">다음글 ▼</span><span class="title">[보도자료] 다이소, 서울 중구청 저소득층에 연 3천만원 규모 생필품 후원</span><span class="day">2018-03-05</span>
                        </a>
                    </li //-->
                </ul>
                <div class="textCenter">
                    <a href="./custommerNotice.php" class="blueBtn">확인</a>
                </div>
            </div>
        </div>
    </section>

<? include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"; ?>