<? include $_SERVER['DOCUMENT_ROOT']."/inc/header.php";

	$p = ( !$_GET["p"] ) ? "1" : $_GET["p"];
	$linenum = ( $linenum ) ? $linenum : "10";
	$startnum = ( $p - 1 ) * $linenum;

	$where = "WHERE noState='Y'";
	if( $_GET['co'] && $_GET['keyword'] )
	{
		$where = " AND ".$_GET['co']." LIKE '%".$_GET['keyword']."%'"; 
	}

	$result = $mysqli->query("SELECT idx FROM hd_notice ".$where);
	$count	= $result->num_rows;
	$viewCount = $count - $startnum;
	@$total_page = intval(($count - 1) / $linenum) + 1;

	$result->close;

	$result = $mysqli->query("SELECT * FROM hd_notice ".$where." ORDER BY regDate DESC LIMIT ".$startnum.", ".$linenum);
	$tmp = 0;
	while($row = $result->fetch_array())
	{
		$Data[$tmp]["idx"]			= $row["idx"];
		$Data[$tmp]["noTitle"]		= $row["noTitle"];
		$Data[$tmp]["noContents"]	= $row["noContents"];
		$Data[$tmp]["noStDate"]		= str_replace("-", ". ", $row["noStDate"]);
		$Data[$tmp]["noEnDate"]		= str_replace("-", ". ", $row["noEnDate"]);
		$Data[$tmp]["noFile"]		= $row["noFile"];
		$Data[$tmp]["noFileName"]	= $row["noFileName"];
		$Data[$tmp]["noState"]		= $row["noState"];
		$Data[$tmp]["regDate"]		= str_replace("-", ". ", substr($row["regDate"], 0, 10));
		$Data[$tmp]["modDate"]		= str_replace("-", ". ", substr($row["modDate"], 0, 10));
		$tmp++;
	}

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
                <div class="searchBox clearfix">
					<form name="searchForm" id="searchForm" method="get">
                    <div class="searchform">
                        <select name="co" id="co">
                            <option value="">전체 ▼</option>
                            <option value="noTitle">제목</option>
                        </select>
                        <input type="text" name="keyword" id="keyword" value="<?=$_GET['keyword']?>">
                        <a class="blueBtn btnSearch">검색</a>
                    </div>
					</form>
                    <span>전체 <strong><?=$count?></strong>건</span>
                </div>
                <ul class="noticeList">
				<?
					for($i = 0; $i < $tmp; $i++)
					{
				?>
                    <li>
                        <div class="imgBox">
                            <img src="/_data/korean/<?=$Data[$i]['noFile']?>" alt="">
                        </div>
                        <div>
                            <ul>
                                <li class="title"><h3><a href="./custommerNotice_view.php?idx=<?=$Data[$i]['idx']?>"><?=$Data[$i]['noTitle']?></a></h3></li>
                                <li class="day"><?=$Data[$i]['regDate']?></li>
                                <li>
                                    <a href="./custommerNotice_view.php?idx=<?=$Data[$i]['idx']?>">
                                        <?=$Data[$i]['noContents']?>
                                    </a>
                                </li>
                            </ul>
                        </div>
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
    </section>
<script type="text/javascript">
$(function() {
	$('.btnSearch').click(function() {
		$('form#searchForm').submit();
	});
});
</script>

<? include $_SERVER['DOCUMENT_ROOT']."/inc/footer.php"; ?>