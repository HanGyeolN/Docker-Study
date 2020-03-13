#**************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: hna <hna@student.42seoul.kr>               +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/03/13 16:37:22 by hna               #+#    #+#              #
#    Updated: 2020/03/13 22:28:10 by hna              ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

# OS
FROM ubuntu:18.04
MAINTAINER Hna <ghnruf@naver.com>

# Avoiding user interaction with tzdata
ENV DEBIAN_FRONTEND=noninteractive

# Installs
RUN apt-get update
RUN apt-get install -y apache2 # Install Apache web server (Only 'yes')
RUN apt-get install -y software-properties-common
RUN add-apt-repository ppa:ondrej/php
RUN apt-get update
RUN apt-get install -y php5.6

# Connect PHP & MySQL
RUN apt-get install -y php5.6-mysql

# Open Port
EXPOSE 80

# Execute apache background
CMD ["apachectl", "-D", "FOREGROUND"]
