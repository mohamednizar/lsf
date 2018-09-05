# install composer dependancies before build the dockerr image
apt-get install composer
cd sleas-api/www
composer install
composer dumpautoload -o
cd ../../

#build the docker imagge

docker-compose build
#run the up the docker containers
docker-compose up 