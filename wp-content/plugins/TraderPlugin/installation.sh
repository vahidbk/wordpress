sudo mkdir /var/www/.local
sudo mkdir /var/www/.cache
sudo chown www-data.www-data /var/www/.local
sudo chown www-data.www-data /var/www/.cache

sudo chown -R  www-data.www-data js
sudo chown -R  www-data.www-data css
sudo chmod -R 755 js
sudo chmod -R 755 css

sudo apt-get install libapache2-mod-wsgi -y

sudo -H -u www-data pip3 install setuptools
sudo -H -u www-data pip3 install jdatetime 
sudo -H -u www-data pip3 install pandas
sudo -H -u www-data pip3 install numpy
sudo -H -u www-data pip3 install matplotlib
sudo -H -u www-data pip3 install plotly

