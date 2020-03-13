# Docker exercise

[Docker 설치](https://hub.docker.com/editions/community/docker-ce-desktop-mac/)

[가장 빨리 만나는 Docker](http://pyrasis.com/docker.html)

Mysql 설정

php 프로그래밍

WordPress

## docker 명령어 응용

모든 컨테이터 목록을 불러와서 모든 컨테이너를 제거

`$docker rm -f 'docker ps -a -q'`

빌드에 실패한 이미지 제거

`$docker rmi -f <image_id>`

모든 이미지 제거

`$docker rmi -f 'docker images'`

## apache_php

Objective : 아파치 웹서버 띄워보기

1. [Dockerfile](.apache_php/Dockerfile) 작성

   - [reference](https://docs.docker.com/engine/reference/builder/)

   - [한국어 manual](http://pyrasis.com/docker.html)
</br>
   
2. Dockerfile로 도커 이미지 생성 (빌드)

   `$docker build -t name_test .`

   - 빌드 에러 발생 가능 (문법오류, 설치시 yes같은 옵션, interactive 옵션)

   - 포트 열기, 옵션 처리 등이 Dockerfile 안에서 되어야한다. 

     </br>

3. 도커 이미지를 컨테이너로 띄우기 (실행)

   `$docker run -p 80:80 -v ~/.../html:/var/www/html name_test`

   - 우리 포트와 도커 내부의 포트를 맞춰주고 실행

   - 우리 경로(~/.../html)를 php의 소스코드가 놓이는 기본 경로(/var/www/html)에 연결

     
   
4. php문법에 따라 html안에 php파일을 작성 ([index.php](./apache_php/html/index.php))
   
   ​     
   
       `$docker run -p 81:80 -v ~/.../html:/var/www/html name_test`
   
   - 이런식으로 81번 포트로 바꿔서 열어주면 여러 포트로 접속이 되도록 할 수 있다.

## Mysql

Objective: MySQL 컨테이너 띄워보기

- Docker hub에 공유되어있는 이미지 파일을 사용하면 앞서 Dockerfile을 작성하는 과정과 빌드해서 이미지를 만드는 과정을 생략 할 수 있다.

1. 도커 hub의 MySQL 이미지를 이용해서 컨테이너 띄우기

   `$docker run -d -p 9876:3306 -e MYSQL_ROOT_PASSWORD=password mysql:5.6`

   - MySQL 5.6버전 이미지를 docker hub로부터 찾아서 다운로드

   - p는 앞에 설명한 포트옵션, e는 환경변수 설정, d는 detach?

     

   

2. 컨테이너에 접속하기

   `$docker exec -it <container_id> /bin/bash`

   - bash를 실행해서 컨테이너에 접속한 효과를 낼 수 있다</br>

     
     
     

3. Mysql 실행 및 로그인, 계정 생성

   `$mysql -u root -p`

   - [MySQL Manual]

   ```mysql
   > use mysql;
   > CREATE USER '<user_id>'@'%' IDENTIFIED BY '<password>';
   > GRANT ALL PRIVILEGES ON *.* TO '<user_id>'@'%';
   > FLUSH PRIVILEGES;
   > exit
   ```

   </br>

4. 컨테이너 재부팅

   `$docker restart <container_id>`





## php_mysql

Objective : 서로 다른 컨테이너에 있는 php 웹서버와 mysql을 연동시켜 사용해보기

- [MacOS 에서 IP주소 확인](https://leenow.tistory.com/7)

- Container의 ip주소 확인 `$docker inspect a82200ef8d25 | grep IPAddress`

  </br>

1. [Dockerfile](./php_mysql/Dockerfile) 작성 및 빌드
   
   - 기존 apache_php Dockerfile에 `RUN apt-get install -y php5.6-mysql` 추가. 
   
   - mysql이 php 버전과 맞아야한다.
   
     

2. 빌드 된 이미지로 컨테이너 실행

   `$docker run -p 80:80 -v <외부 html 소스경로>:/var/www/html <컨테이너 이름>`

    

3. php 파일 작성

   - [index.php](./php_mysql/html/index.php)

   - php 문법으로 php페이지와 mysql을 연동

     </br>

4. localhost 접속 후 결과페이지 확인