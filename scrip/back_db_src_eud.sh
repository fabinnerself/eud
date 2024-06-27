#!/bin/bash

fecha_bak_bd=bd_mydb_`date +"%Y%m%d%H%M%S"`.sql
cd /var/www/html/eu/doc/bd/
rm *.sql

mysqldump -u root -p mydb --routines > /var/www/html/eu/doc/bd/${fecha_bak_bd}

cd /var/www/html/

sudo zip -r /var/www/html/backup/src_eu_demo_`date +"%Y%m%d%H%M%S"`.zip eu/

