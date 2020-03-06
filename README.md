NC는 저에게 특별한 곳입니다.
대학시절 '아이온'의 등장으로 많은 사람들과의 추억을 쌓았고 그 인연이 아직도 좋은 관계로 지속되고 있습니다.
게임을 통해 오프라인이 아닌 온라인의 새로운 세상에서의 이전엔 알지 못햇던 즐거움을 알게 되었습니다.

평소 기업의 문화 비전이 중요하다고 생각했습니다.
기업문화는 기업의 가치 뿐만이 아닌 더 나아가 본인과 회사의 성장 동력이라고 생각해왔기 때문입니다.

그래서 채용 중인 NC의 기업문화를 보고 내가 생각하는 가치와도 비슷한 점이 많아
꼭 이 문화속에서 근무를 해보고 싶단 생각이 들게 되었습니다. 

NC 핵심가치 세가지 부분 모두 매력적으로 다가왔으며, 
특히 인상적인 부분은
사소한 불편을 없애고자 끊임없이 개선하고 노력 한다는 Never ending change 였습니다.

그 가치를 바탕으로 
더 나은 성과를 내어 누구나 불편없이 사용하는 서비스를 만들고 사용자에게
더욱 높은 퀄리티를 제공하는 함으로 
서비스를 이용하는 모든 사람들에게 즐거움으로 연결된 새로운 세상을 느끼게 해주고 싶은 소망과 기대가 생겼습니다.

경험 하나 예로들면

고 해상도 디바이스들의 등장으로 인해 백터기반의 그래픽인 SVG를 사용함으로 
유저에게 좀 더 나은 서비스를 제공 하고 싶었습니다.
하지만 회사의 시스템상 SVG를 도입 할 수 없어서 난항을 겪고 있을 때 였습니다.

저는 회사 시스템에 범위에서 벗어나지 않고 고해상도 디스플레이에 대응 할수 있는 방법을
다방면으로 찾아보고 실행에 옮겼습니다.

그러던 도중 처음으로 SVG-Sprite를 만들어 신규 제작 중이던 서비스에 사용을 하게 되였지만,
다양한 종류의 디바이스를 통해 이용하는 서비스인만큼 몇몇의 디바이스에서 오류가 발생하게 되었고,
그로인해 준비 했던 SVG-Sprite는 사용을 못하는 상황이 되었습니다.

하지만 저는 여기서 포기하지 않고, 또 다른 방법이 있을 것이라고 생각하고, 새로운 방법을 준비해 나갔습니다.
그러던 중 SVG를 DataURL로 변환하여 사용 할 수 있는 방법을 알 게 되었습니다.
그렇지만 너무 사용성이 불편하여 사용이 힘들 것이라는 다수의 의견을 통해
Sass를 이용하여 모듈화를 하여 SVG를 DataURL로 변환하여 손쉽게 사용 할 수 있는 구조를 만들었습니다.

이를통해 사내 시스템을 수정하지 않고 SVG를 이용하여
고해상도 디스플레이에 대응할 수 있는 방법을 얻게 되었고,
기능적으로는 image request를 줄여 속도 개선의 효과를 내게 되었습니다.
또한 서비스를 이용 하는 입장에선 고해상도 디바이스의 사용 불편을 해소 시킬 수 있게 되었습니다.

이후 신규서비스의 충분한 테스트를 걸쳐 현재는 전 서비스에 차근차근 도입을 하게 되었습니다.

또한 배움을 게을리 하지 않으려 노력하여 꾸준히 스터디/행사 등을 통하여 지식을 습득하고 트렌트에 뒤쳐지지 않으려 노력합니다.
트렌드에 뒤쳐졌을 경우 사용자에게 불편함을 주고, 서비스를 외면 하게 만든다고 생각하기 때문입니다.
때로는 너무 빠른 변화에 따라가기 힘들기도 하지만 서비스를 이용하는 
사용자들의 피드백 혹은 만족하며 사용하는 모습을 볼때 뿌듯함을 느끼고, 다시 한번 힘을 낼 수 있게 됩니다.

이러한 경험을 바탕으로
NC 입사하게 되면 개선 할 만한 시스템이 있을 경우 적극적으로 문제 해결을 위하여
도전하는 자세로 안주하지 않고 지속해서 개선 방향을 제시하고 서비스를 제공함으로
사소한 불편도 끊임없이 개선해 나가며,
이를 통해 사람들에게 더 큰 즐거움과 감동을 주려고 노력하는 인재가 되도록 하겠습니다.


즐거움을 알려주었던 NC에 어느덧 성장하여 지원하게 되어 영광이고,
제가 느꼈던 즐거움을 또 다른 사람에게 전달 할 수 있는 브릿지 역할이 될 수 있는 좋은 기회가 되었으면 좋겠습니다.

# AFreecaTV
## 아프리카티비( 개인방송국 )  http://bj.afreecatv.com/{userid}
### [개인 방송국](http://bj.afreecatv.com/khm11903){: target="_blank"}
```
	- 개발자와의 협의를 통해 맞추어진 Component 단위의 마크업
	- 로딩속도 완화를 위한 이미지 작업
	image-Sprite > svg-Sprite > dataURL 변환 SVG 적용
	- 레이지 로딩 타입 제작
	- 공통 컴포넌트 CSS 모듈화
	- 유저 니즈에 맞춘 테마 추가( 어두운 모드 )
	- SMR 도입으로 인한 SMR 모드 추가
	- 후원 팝업 팝업 추가 및 수정
	- 다국어 작업 ( 영어, 일본어, 중국어(간체), 중국어(번체), 태국어 )
```
### [MY서비스](http://my.afreecatv.com/feed){: target="_blank"}
```
	- 개발자와의 협의을 통해 맞추어진 Component 단위의 마크업
	- Cross Browsing 문제에 따른 이슈 처리
	- 테마 추가( 어두운 모드 )
	- 로딩속도 완화를 위한 이미지 작업 ( dataURL 변환 SVG 적용 )
	- 다국어 작업 ( 영어, 일본어, 중국어(간체), 중국어(번체), 태국어 )
```

### [VOD](http://bj.afreecatv.com/khm11903){: target="_blank"}
```
	- VOD 페이지 고도화 작업 ( css 정리 및 타입변경 )
	- VOD Player에 플레이리스트 추가
	- SMR 카테고리 추가로 인한 신규 페이지 개설
```
### [멸망전통합페이지](http://bj.afreecatv.com/khm11903){: target="_blank"}
```
	- BJ멸망전 통합페이지 신규 제작
	- 유저 사용성 향상을 위해 기능 추가 및 UI 개선 ( 일정 , 랭킹, 리그타입, 게시판 추가 )
```

### [스포츠](http://bj.afreecatv.com/khm11903){: target="_blank"}
```
	- 스포츠 페이지 리뉴얼 제작
	- 사용자 환경에 따른 기능 추가 ( 일정 , 하이라이트 , 다시보기 )
	- 페이지별 광고 타입 추가
```

### 기타
```
	- 아프리카TV 전사 서비스 이슈 대응
	- 오픈스튜디오 페이지 제작 및 추가
	- 내부 관리 페이지 리뉴얼
	- 다수의 이벤트 페이지 제작 ( 스타크래프트리그, 배틀그라운드리그, FIFA온라인리그 등 )

	- 단순 이벤트 페이지 반복 작업을 줄이고자 개발자와 협의를 통한 내용을 토대로 관리자 페이지에서 등록 가능한 템플릿 및 가이드 제작
	- vw( viewport width )를 이용한 반응형 템플릿 제작
```

## 아성
### [아성](http://www.asunggroup.com/){: target="_blank"}
## 아성HMP
### [아성HMP](http://www.asunghmp.com/){: target="_blank"}

## 현대백화점 사회복지재단
### [현대백화점사회복지재단](http://www.ehyundai.com/newPortal/sc/main/main.do){: target="_blank"}



## 골프크리틱	## 골프크리틱
### [골프크리틱](https://pangnima.github.io/golfcritic){: target="_blank"}




## 삼성모바일프레스
### [삼성모바일프레스](http://www.samsungmobilepress.com/){: target="_blank"}

## 윌리엄홀딩스
### [윌리엄홀딩스](https://pangnima.github.io/william){: target="_blank"}

## 기초학습능력검사
### [기초학습능력검사](http://www.nise-test.com/){: target="_blank"}



## 윈텔립스
### [윈텔립스](https://www.wintelips.com/){: target="_blank"}
## 디오플렉스
### [디오플렉스](http://doplex.co.kr/){: target="_blank"}
