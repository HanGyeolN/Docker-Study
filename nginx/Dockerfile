# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: hna <hna@student.42seoul.kr>               +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/03/13 16:37:22 by hna               #+#    #+#              #
#    Updated: 2020/03/14 20:41:24 by hna              ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

# OS
FROM debian:buster
MAINTAINER Hna <ghnruf@naver.com>

# Installs
RUN apt-get update
RUN apt-get install -y nginx
RUN apt-get install -y php7.3 php7.3-fpm php7.3-mysql php-common php7.3-cli
RUN apt-get install -y php7.3-common

# nginx foreground setting 
RUN echo "\ndaemon off;" >> /etc/nginx/nginx.conf

# Open Port
EXPOSE 80
EXPOSE 443

# Execute nginx
CMD ["nginx"]
