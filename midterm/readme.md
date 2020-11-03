중간고사 대체 과제: Steam Store Games
=====================================

1. 개발환경 소개  
-  MariaDB/Linux: MySql과 MariaDB의 차이점을 찾어보던 중 MariaDB가 조인쿼리의 최적화를 지원한다는 점을 보고 선택하였다.
-  데이터셋: https://www.kaggle.com/nikdavis/steam-store-games
-  테이블: steam(게임 정보들), steam_description(게임 상세설명), steam_media(게임 이미지, 동영상 등)

2. 발견한 정보 소개  
-  카테고리별 게임 목록: 게임들을 긍정적인 평가 순(인기순), 가장 최근에 릴리즈 된 순으로 보여준다
-  장르별 게임 목록: 장르를 선택하면 해당 장르의 게임들의 목록을 인기순으로 보여준다.
-  가격대별 게임 목록: 가격대를 선택하면 해당 가격대의 게임들의 목록을 인기순으로 보여준다.
-  게임에 대해 자세히보기(steam, steam_description, steam_media 세 테이블 조인): 다양한 기준으로 나뉘어진 게임들 목록에서 특정 게임을 선택하면 게임의 개발자, 발행사, 비용, 상세설명 등의 정보와 게임 헤더 사진을 보여준다

3. 과제 동영상링크:  
<a href="https://youtu.be/FbJ___oxEVc">자막을 켜고 시청해주세요!</a>
