# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: hna <hna@student.42seoul.kr>               +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/03/13 16:37:22 by hna               #+#    #+#              #
#    Updated: 2020/03/19 19:40:55 by hna              ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

# OS
FROM debian:buster
MAINTAINER Hna <ghnruf@naver.com>

# Install nginx, php, mysql
RUN apt-get update
RUN apt-get install -y nginx
RUN apt-get install -y php7.3-fpm php7.3-mysql php7.3-curl
RUN apt-get install -y default-mysql-server

# SSL
RUN openssl req -newkey rsa:2048 -x509 -sha256 -days 3650 -nodes -out \
			/etc/nginx/example.crt -keyout /etc/nginx/example.key -subj \
			"/C=KR/ST=SEOUL/L=SEOUL/OU=42/CN=42"; nginx -t;

# Create database for wordpress
RUN service mysql start && mysql -u root --password="password" \
	-e "CREATE DATABASE wordpress; GRANT ALL ON wordpress.* TO \
	    'wordpressuser'@'localhost' IDENTIFIED BY '1234'";

# Install utils
RUN apt-get install -y procps systemd wget vim curl

# Install wordpress
WORKDIR /tmp
RUN wget https://wordpress.org/latest.tar.gz
RUN tar xzvf latest.tar.gz
RUN cp /tmp/wordpress/wp-config-sample.php /tmp/wordpress/wp-config.php
RUN cp -a /tmp/wordpress/. /var/www/html/example.com
RUN chown -R www-data:www-data /var/www/html/example.com

# Edit config
ADD srcs/wp-config.php /var/www/html/example.com/wp-config.php
ADD srcs/example.com.conf /etc/nginx/sites-available/example.com.conf
ADD srcs/default /etc/nginx/sites-enabled/default
RUN ln -s /etc/nginx/sites-available/example.com.conf /etc/nginx/sites-enabled/

# Install phpmyadmin
WORKDIR /tmp
RUN wget https://files.phpmyadmin.net/phpMyAdmin/4.9.0.1/phpMyAdmin-4.9.0.1-english.tar.gz
RUN tar -xzvf phpMyAdmin-4.9.0.1-english.tar.gz; mv phpMyAdmin-4.9.0.1-english phpmyadmin
RUN mv /tmp/phpmyadmin /var/www/html/

# Open Port
EXPOSE 80
EXPOSE 443

# Execute mysql, php, nginx
CMD service mysql start && service php7.3-fpm start && nginx -g "daemon off;"
