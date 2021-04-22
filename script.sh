#!/bin/bash
BoxVersion='1.0.0';

LBLUE='\e[94m';
RED='\e[31m';
CYN='\e[96m';
GRN='\e[92m';
NC='\e[0m';
bold=$(tput bold);
normal=$(tput sgr0); 
CHK='\xE2\x9C\x94';  
   
printf "\n\n${bold}${CYN}Setting up your WordPress Clone Box v${BoxVersion} environment...${NC}${normal}\n";

sudo touch /dev/null;
sudo touch $VMLOG &> /dev/null;  

# create base directory
sudo mkdir -p /var/www/base &> /dev/null;

# switch to base directory and clone master Wordpress copy 
cd /var/www/base && git clone https://github.com/WordPress/WordPress.git wordpress &> /dev/null;

# copy wordpress configuration file 
sudo cp /var/www/wp-config.php /var/www/base/wordpress/wp-config.php;

# remove any base configuration file for nginx 
sudo rm -rf /etc/nginx/sites-enabled/base*

# copy nginx configuration file 
sudo cp /var/www/base.conf /etc/nginx/sites-enabled/base.conf

# set owner for wordpress files 
sudo chown -R www-data:vagrant /var/www/base/wordpress;

# database items
su -;
mysql -e "CREATE DATABASE wordpress;";
mysql -e "CREATE USER 'vagrant'@'localhost' IDENTIFIED BY 'vagrant';";
mysql -e "GRANT ALL PRIVILEGES ON * . * TO 'vagrant'@'localhost';";
mysql -e "FLUSH PRIVILEGES;";

# restart all services - just in case  
sudo systemctl stop apache2 &> /dev/null;
sudo systemctl restart nginx &> /dev/null;
sudo systemctl restart php7.4-fpm &> /dev/null;
sudo systemctl restart redis &> /dev/null;

printf "${GRN}${CHK} Complete! ${NC}\n"; 
 
 
printf "\n\n${GRN}Box is ready to use, enjoy!${NC}${normal}\n\n\n"; 

printf "Use [vagrant ssh] to log in to your new box!\n\n";
 