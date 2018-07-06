<? 
	include $_SERVER['DOCUMENT_ROOT']."/inc/header.php"; 

	if($_SESSION['qna'] != $_GET['idx'] )
	{
		echo "<script type='text/javascript'>
				alert('잘못된 접근입니다.');
				location.href='./personnelStep.php';
			  </script>";
		exit();
	}

	$result = $mysqli->query("SELECT * FROM hd_inquiry_job WHERE idx='".$_GET['idx']."'");
	$row = $result->fetch_assoc();

	@$result->close;
	@$mysqli->close;
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
                    <div class="tableStyle_04">
                        <ul>
                            <li class="tableHead">
                                <p class="title"><img src="../images/sub/lockmid.png" alt="자물쇠"><?=$row['inTitle']?></p>
                                <span class="name"><strong>작성자 |</strong> <?=$row['inName']?></span>
                                <span class="day"><?=$row['regDate']?></span>
                            </li>
                            <li class="personInfo clearfix">
                                <div>
                                    <span>이름</span>
                                    <span><?=$row['inName']?></span>
                                </div>
                                <div>
                                    <span>희망분야</span>
                                    <span>디자인</span>
                                </div>
                                <div>
                                    <span>이메일</span>
                                    <span><?=$row['inEmail']?></span>
                                </div>
                                <div>
                                    <span>연락처</span>
                                    <span><?=$row['inPhone']?></span>
                                </div>
                            </li>
                            <li class="text">
                                <div>
                                    <?=$row['inContents']?>
                                </div>
                            </li>
                        </ul>
                        <div class="textCenter">
                            <a href="./personnelStep.php" class="blueBtn">확인</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<? include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"; ?>