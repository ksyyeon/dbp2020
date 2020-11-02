중간고사 과제 회고
=====================================

1. 새로배운 내용  
- a:link {}, a:visited {}, a:active {}, a:hover {} 하이퍼링크의 상태별로 style을 지정할 수 있다
- <code>javascript:history.go(-1)</code> 페이지 뒤로가기

2. 문제가 발생한 부분 + 해결과정  
- csv파일 table로 import하기 
    1. 필요한 데이터셋을 csv파일로 다운/저장한다
    2. 내 데이터베이스 서버와 workbench를 연결한다 <a href="https://hoing.io/archives/383">참고1</a> <a href="https://qastack.kr/dba/3489/trying-to-use-mysql-workbench-with-tcp-ip-over-ssh-failed-to-connect">참고2</a> 
    3. 스키마를 생성하고 스키마에 오른쪽 마우스를 눌러 Table Data Import Wizard 선택
    4. 다운/저장했던 csv파일을 로드하면 끝
    ※ 중요한 점은 데이터베이스에서 로딩할 수 있는 csv파일의 형식이 제한적이라서 반드시 데이터값 구분이 콤마로 구분되어있어야한다. 데이터 하나라도 잘못 되어있으면 csv형식으로 인식하지 못한다...

3. 아쉬운점  
구현 실패한 기능들인데... 시간의 여유가 생기면 다시한번 시도해보고싶다!
- <a href="http://blog.naver.com/PostView.nhn?blogId=haruby511&logNo=221459114690&parentCategoryNo=&categoryNo=7&viewDate=&isShowPopularPosts=true&from=search">json 형식으로 된 데이터 파싱해서 이용하기</a>
- <a href="https://chojja7.tistory.com/14">페이징</a>

3. 회고  
작년에 프로젝트 설계 강의를 들으면서 workbench를 사용해봤던 경험이 이번 과제 진행에 정말 큰 도움을 줬다. 게임 상세설명이나 썸네일 이미지 링크 같은 경우는 필드 길이가 너무 길어서 터미널 창에서는 보기 힘들고 그랬는데 workbench에서는 보기 좋은 형태로 조회되어서 좋았다. 그리고 기능 동작 구현은 생각보다 문제없이 진행되었는데 CSS와 화면 레이아웃이 마음대로 적용되지 않아서 애를 많이 먹었다. 과제 시작할 때 내 상상속의 디자인은 훨씬 정교했는데 막상 해보니 색깔을 입히는 정도가 내 한계였다..ㅎ 지금까지 자바와 안드로이드가 더 익숙해서 프로젝트 진행은 항상 모바일 앱으로만 진행해왔는데, 데베플을 반학기 들은 후기는 웹프로그래밍이 훨씬 즐겁고 재밌다고 느껴진다! 앞으로 자바스크립트를 이용하는 수업도 몹시 기대가 된다. 
