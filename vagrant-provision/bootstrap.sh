#!/usr/bin/env bash

apt-get update
apt-get upgrade -y

echo "installing apache, php, mysql, etc"
apt-get -y install apache2 php5 memcached php5-mysql php5-memcached php5-curl php5-intl

echo  "setting /var/www as vagrant's start directory"
grep "cd /var/www" /home/vagrant/.bashrc || printf "cd /var/www\n" >> /home/vagrant/.bashrc
