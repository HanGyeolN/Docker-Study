# Docker exercise

Docker 설치



## docker 명령어

모든 컨테이터 목록을 불러와서 모든 컨테이너를 제거

$docker rm -f 'docker ps -a -q'

빌드에 실패한 이미지 제거

$docker rmi -f image id

## apache_php

Objective : 아파치 웹서버 띄워보기

1. Dockerfile 작성

   - Dockerfile 문법
   - 

2. Dockerfile로 도커 이미지 생성 (빌드)
   $docker build -t name_test .
   -> 빌드 에러 발생 가능 (문법오류, 설치시 yes같은 옵션, interactive 옵션)
   -> 포트 열기, 옵션 처리 등이 Dockerfile 안에서 되어야한다.

   

3. 도커 이미지를 컨테이너로 띄우기 (실행)
   $docker run -p 80:80 -v ~/.../html:/var/www/html name_test
   -> 우리 포트와 도커 내부의 포트를 맞춰주고 실행
   -> 우리 경로(~/.../html)를 php의 소스코드가 놓이는 기본 경로(/var/www/html)에 연결
   -> php문법에 따라 html안에 php파일을 작성
   -> $docker run -p 81:80 -v ~/.../html:/var/www/html name_test
   -> 이런식으로 81번 포트로 바꿔서 열어주면 여러 포트로 접속이 되도록 할 수 있다.



## mysql

Objective: MySQL 컨테이너 만들어보기

