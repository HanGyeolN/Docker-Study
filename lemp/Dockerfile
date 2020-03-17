# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: hna <hna@student.42seoul.kr>               +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/03/13 16:37:22 by hna               #+#    #+#              #
#    Updated: 2020/03/17 18:22:33 by hna              ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

# OS
FROM debian:buster
MAINTAINER Hna <ghnruf@naver.com>

# Install nginx, php, mysql
RUN apt-get update
RUN apt-get install -y nginx
RUN apt-get install -y php7.3-fpm php7.3-mysql 
RUN apt-get install -y default-mysql-server

# Install for ps aux, systemctl
RUN apt-get install -y procps systemd

# Edit config
ADD srcs/default /etc/nginx/sites-enabled/default

# Open Port
EXPOSE 80
EXPOSE 443

# Execute nginx
CMD service mysql start && service php7.3-fpm start && nginx -g "daemon off;"
