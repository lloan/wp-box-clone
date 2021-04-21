#!/bin/bash
BoxVersion='1.0.2';

LBLUE='\e[94m';
RED='\e[31m';
CYN='\e[96m';
GRN='\e[92m';
NC='\e[0m';
bold=$(tput bold);
normal=$(tput sgr0); 
CHK='\xE2\x9C\x94';  
   
printf "\n\n${bold}${CYN}Setting up your ESRI Box v${BoxVersion} environment...${NC}${normal}\n";

sudo touch /dev/null;
sudo touch $VMLOG &> /dev/null; 
  
# Stopping Apach and restarting services   
printf "\nStopping Apache service in case it's running... ${NC}\n";
sudo systemctl stop apache2 &> /dev/null;
printf "${GRN}${CHK} Complete! ${NC}\n";

printf "\nRestarting Nginx... ${NC}\n";
sudo systemctl restart nginx &> /dev/null;
printf "${GRN}${CHK} Complete! ${NC}\n";

printf "\nRestarting PHP... ${NC}\n"; 
sudo systemctl restart php7.4-fpm &> /dev/null;
printf "${GRN}${CHK} Complete! ${NC}\n";

printf "\nRestarting Redis... ${NC}\n"; 
sudo systemctl restart redis &> /dev/null;
printf "${GRN}${CHK} Complete! ${NC}\n"; 

# Creating folder that will hold our project files 
printf "\nCreating directory for project files on host machine... ${NC}\n";
sudo mkdir -p /var/www/html &> /dev/null;
printf "${GRN}${CHK} Complete! ${NC}\n"; 
 
# Moving projcet files from box to new folder and removing zip folder. 
printf "\nUpdating box information... ${NC}\n";
cp /var/www/index.php /var/www/html/ &> /dev/null;
printf "${GRN}${CHK} Complete! ${NC}\n";  


printf "\n\n${GRN}Box is ready to use, enjoy!${NC}${normal}\n\n\n"; 

printf "Use [vagrant ssh] to log in to your new box!\n\n";
 