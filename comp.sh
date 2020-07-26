#!/bin/sh
USERNAME=$1;
docker run -i --name $USERNAME alexionut02/alpinegcc:1.0
docker start $USERNAME
docker cp /opt/lampp/htdocs/DevInsider/storage/app/$USERNAME.cpp $USERNAME:/
docker container exec $USERNAME sh -c "g++ $USERNAME.cpp 2>err$USERNAME.txt"
docker cp $USERNAME:/err$USERNAME.txt /opt/lampp/htdocs/DevInsider/storage/app/

if [ ! -s storage/app/err$USERNAME.txt ]
then
  docker cp /opt/lampp/htdocs/DevInsider/storage/app/1in$USERNAME.txt $USERNAME:/
  docker cp /opt/lampp/htdocs/DevInsider/storage/app/2in$USERNAME.txt $USERNAME:/
  docker cp /opt/lampp/htdocs/DevInsider/storage/app/3in$USERNAME.txt $USERNAME:/
  docker cp /opt/lampp/htdocs/DevInsider/storage/app/4in$USERNAME.txt $USERNAME:/
  docker cp /opt/lampp/htdocs/DevInsider/storage/app/5in$USERNAME.txt $USERNAME:/
  docker container exec $USERNAME sh -c "./a.out < 1in$USERNAME.txt > 1output$USERNAME.txt ; ./a.out < 2in$USERNAME.txt > 2output$USERNAME.txt ; ./a.out < 3in$USERNAME.txt > 3output$USERNAME.txt ; ./a.out < 4in$USERNAME.txt > 4output$USERNAME.txt ; ./a.out < 5in$USERNAME.txt > 5output$USERNAME.txt"
  docker cp $USERNAME:/1output$USERNAME.txt /opt/lampp/htdocs/DevInsider/storage/app
  docker cp $USERNAME:/2output$USERNAME.txt /opt/lampp/htdocs/DevInsider/storage/app
  docker cp $USERNAME:/3output$USERNAME.txt /opt/lampp/htdocs/DevInsider/storage/app
  docker cp $USERNAME:/4output$USERNAME.txt /opt/lampp/htdocs/DevInsider/storage/app
  docker cp $USERNAME:/5output$USERNAME.txt /opt/lampp/htdocs/DevInsider/storage/app
fi
#docker stop $1
#docker rm $1
