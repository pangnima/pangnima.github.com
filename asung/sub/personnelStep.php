<? include $_SERVER['DOCUMENT_ROOT']."/inc/header.php";

	$p = ( !$_GET["p"] ) ? "1" : $_GET["p"];
	$linenum = ( $linenum ) ? $linenum : "10";
	$startnum = ( $p - 1 ) * $linenum;

	$where = "";
	if( $_GET['co1'] && $_GET['keyword1'] )
	{
		$where = "WHERE ".$_GET['co1']." LIKE '%".$_GET['keyword1']."%'"; 
	}

	$result = $mysqli->query("SELECT idx FROM hd_open_job ".$where);
	$count	= $result->num_rows;
	$viewCount = $count - $startnum;
	@$total_page = intval(($count - 1) / $linenum) + 1;

	$result->close;

	$result = $mysqli->query("SELECT * FROM hd_open_job ".$where." ORDER BY regDate DESC LIMIT ".$startnum.", ".$linenum);
	$tmp = 0;
	while($row = $result->fetch_array())
	{
		$Data[$tmp]["idx"]			= $row["idx"];
		$Data[$tmp]["jbTitle"]		= $row["jbTitle"];
		$Data[$tmp]["jbStDate"]		= str_replace("-", ". ", $row["jbStDate"]);
		$Data[$tmp]["jbEnDate"]		= str_replace("-", ". ", $row["jbEnDate"]);
		$Data[$tmp]["jbLink"]		= $row["jbLink"];
		$Data[$tmp]["jbOpenType"]	= ($row["jbOpenType"]=="T")?"":"_blank";
		$Data[$tmp]["regDate"]		= str_replace("-", ". ", substr($row["regDate"], 0, 10));
		$Data[$tmp]["modDate"]		= str_replace("-", ". ", substr($row["modDate"], 0, 10));

		$Data[$tmp]["jbOnOff"]		= ($row["jbEnDate"]>date("Y-m-d"))?"전형종료":"모집중";
		$Data[$tmp]["jbOnOffClass"]	= ($row["jbEnDate"]>date("Y-m-d"))?"end":"ongoing";
		$tmp++;
	}

	@$result->close;
	@$mysqli->close;

	
	$p2 = ( !$_GET["p2"] ) ? "1" : $_GET["p2"];
	$linenum2 = ( $linenum2 ) ? $linenum2 : "10";
	$startnum2 = ( $p2 - 1 ) * $linenum2;

	$where2 = "";
	if( $_GET['co2'] && $_GET['keyword2'] )
	{
		$where2 = "WHERE ".$_GET['co2']." LIKE '%".$_GET['keyword2']."%'"; 
	}

	$result2 = $mysqli->query("SELECT idx FROM hd_inquiry_job ".$where2);
	$count2	= $result2->num_rows;
	$viewCount2 = $count2 - $startnum2;
	@$total_page2 = intval(($count2 - 1) / $linenum2) + 1;

	$result2->close;

	$result2 = $mysqli->query("SELECT * FROM hd_inquiry_job ".$where2." ORDER BY regDate DESC LIMIT ".$startnum2.", ".$linenum2);
	$tmp2 = 0;
	while($row2 = $result2->fetch_array())
	{
		$Data2[$tmp2]["idx"]			= $row2["idx"];
		$Data2[$tmp2]["inName"]			= substr($row2["inName"],0,6)."*";
		$Data2[$tmp2]["inEmail"]		= $row2["inEmail"];
		$Data2[$tmp2]["inPhone"]		= $row2["inPhone"];
		$Data2[$tmp2]["inTitle"]		= $row2["inTitle"];
		$Data2[$tmp2]["inControllType"]	= $row2["inControllType"];
		$Data2[$tmp2]["inContents"]		= $row2["inContents"];
		$Data2[$tmp2]["regDate"]		= str_replace("-", ". ", substr($row2["regDate"], 0, 10));
		$tmp2++;
	}

	@$result2->close;
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
                        <a href="personnelSystem.php">인재채용 <span>▼</span></a>
                        <ul>
                            <li><a href="companyIntro.php">회사소개</a></li>
                            <li><a href="businessModel.php">사업소개</a></li>
                            <!-- <li><a href="personnelSystem.php">인재채용</a></li> -->
                            <li><a href="managementSystem.php">윤리경영</a></li>
                            <li><a href="deliveryPartner.php">납품안내</a></li>
                            <li><a href="customerNotice.php">고객센터</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">채용문의 <span>▼</span></a>
                        <ul>
                            <li><a href="./personnelSystem.php">인사제도</a></li>
                            <!-- <li><a href="./personnelStep.php">채용문의</a></li> -->
                        </ul>
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
                    <li class="on">채용절차</li>
                    <li>채용공고</li>
                    <li>채용/문의</li>
                </ul>
                <div class="infoBox">
                    <ul class="clearfix">
                        <li>
                            <div class="title">지원자격</div>
                            <div>
                                - 국내 및 해외 정규 대학 졸업자 또는 졸업 예정자<br/>
                                - 취업보호 대상자(국가보훈대상자 등) 관련 법령에 따라 우대<br/>
                                - 해외여행 결격사유가 없는 자(단, 남자는 병역필 또는 면제자)
                            </div>
                        </li>
                        <li>
                            <div class="title">채용시기</div>
                            <div>
                                - 그룹사 공채 일정에 따라 상반기, 하반기 3회 실시<br/>
                                - 필요에 따라 상시 채용 진행
                            </div>
                        </li>
                        <li>
                            <div class="title">지원방법</div>
                            <div>
                                - 홈페이지 내 채용문의 또는 취업 포털사이트를 통한 접수
                            </div>
                        </li>
                        <li>
                            <div class="title">채용문의 </div>
                            <div>
                                - MAIL   recruit@asunggroup.com
                                - T E L   02-405-0770
                            </div>
                        </li>
                        <li class="long">
                            <div class="title">채용절차 </div>
                            <div>
                                <img src="../images/sub/personSetp_01.png" alt="채용절차">
                            </div>
                        </li>
                        <li class="long">
                            <div class="title">모집부문 </div>
                            <div class="mb">
                                <ul>
                                    <li>해외영업부문</li>
                                    <li>
                                        <p>해외 상품소싱</p>
                                        <p>무역 일반 업부</p>
                                    </li>
                                    <li>해외영업부문 지원자는 영어 또는 중국어로 업무가 가능한 자 </li>
                                </ul>
                                <ul class="clearfix">
                                    <li>경영기획부문</li>
                                    <li>사업기획/영업분석<br/>신규사업 기획</li>
                                    <li>경영기획부문 경력 지원자는 과장/차장급으로 기업체 전략 기획 부서 또는 경영 컨설팅 업무 경력자 </li>
                                </ul>
                                <ul class="clearfix">
                                    <li>경영지원부문</li>
                                    <li>인사/총무/재무</li>
                                    <li>디자인부문 지원자는 포트폴리오 제출 및 실기 테스트가 필요 </li>
                                </ul>
                                <ul class="clearfix">
                                    <li>해외영업부문</li>
                                    <li>패키지, 캐릭터 디자인</li>
                                    <li>지원서 제출 후 서류 합격자에 한해 별도의 면접 절차 예정</li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

                
                <div class="infoBox">
                    <div class="searchBox clearfix">
					<form name="searchForm1" id="searchForm1" method="get">
                        <div class="searchform">
                            <select name="co1" id="co1">
                                <option value="">전체 ▼</option>
                                <option value="jbTitle" <?=($_GET['co1']=='jbTitle')?"selected":""?>>제목</option>
                            </select>
                            <input type="text" name="keyword1" id="keyword1" value="<?=$_GET['keyword1']?>">
                            <a class="blueBtn btnSearch1">검색</a>
                        </div>
                        <span>전체 <strong><?=$count?></strong>건</span>
					</form>
                    </div>
                    <div class="tableStyle_01">
                        <ul>
                            <li class="tableHead">
                                <span class="num">번호</span>
                                <span class="title">제목</span>
                                <span class="day">접수기간</span>
                            </li>
						<?
							for($i = 0; $i < $tmp; $i++)
							{
						?>
							<li>
                                <span class="num"><?=$viewCount?></span>
                                <span class="title"><a href="<?=$Data[$i]["jbLink"]?>" target="<?=$Data[$i]["jbOpenType"]?>"><?=$Data[$i]["jbTitle"]?></a></span>
                                <span class="day"><?=$Data[$i]["jbStDate"]?> ~ <?=$Data[$i]["jbEnDate"]?></span>
							</li>
						<?
								$viewCount--;
							}
						?>
                        </ul>
                        <div class="pager">
                            <ul class="clearfix">
							<? 
								$get_val = "&co=".$_GET["co1"]."&keyword=".$_GET["keyword1"];
								include $_SERVER['DOCUMENT_ROOT']."/lib/pro_page.php";
							?>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="infoBox">
                    <div class="searchBox clearfix">
					<form name="searchForm2" id="searchForm2" method="get">
                        <div class="searchform">
                            <select name="co2" id="co2">
                                <option value="">전체 ▼</option>
                                <option value="inTitle" <?=($_GET['co2']=='inTitle')?"selected":""?>>제목</option>
                            </select>
                            <input type="text" name="keyword2" id="keyword2" value="<?=$_GET['keyword2']?>">
                            <a class="blueBtn btnSearch2">검색</a>
                        </div>
                        <span>전체 <strong><?=$count2?></strong>건</span>
					</form>
                    </div>
                    <div class="tableStyle_02">
                        <ul>
                            <li class="tableHead">
                                <span class="num">번호</span>
                                <span class="title">제목</span>
                                <span class="name">작성자</span>
                                <span class="day">접수기간</span>
                            </li>
						<?
							for($i = 0; $i < $tmp2; $i++)
							{
						?>
							<li>
                                <span class="num"><?=$viewCount2?></span>
                                <span class="title"><a href="personnelQnA_LOCK.php?idx=<?=$Data2[$i]['idx']?>"><img src="../images/sub/lockImg.png" alt="자물쇠"><?=$Data2[$i]["inTitle"]?></a></span>
                                <span class="name"><?=$Data2[$i]['inName']?></span>
                                <span class="day"><?=$Data2[$i]["regDate"]?></span>
							</li>
						<?
								$viewCount2--;
							}
						?>
                        </ul>
                        <div class="textRight">
                            <a href="./personnelQnA_write.php" class="blueBtn">글쓰기</a>
                        </div>
                        <div class="pager">
                            <ul class="clearfix">
							<? 
								$get_val2 = "&co=".$_GET["co2"]."&keyword=".$_GET["keyword2"];
								include $_SERVER['DOCUMENT_ROOT']."/lib/pro_page2.php";
							?>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

<script type="text/javascript">
$(function() {
	$('.btnSearch1').click(function() {
		$('form#searchForm1').submit();
	});

	$('.btnSearch2').click(function() {
		$('form#searchForm2').submit();
	});
});
</script>

<? include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"; ?>