#!/bin/bash

echo '*********************************************'
echo 'Build the new image'
sudo docker build --no-cache -f Dockerfile -t mountain-bird .
echo '*********************************************'
echo 'Stop the old container (if is running)'
sudo docker stop mountain-bird
echo 'Remove the old container'
sudo docker rm mountain-bird
echo '*********************************************'
echo 'Start the new container: exposed port 8001 container name:mountain-bird'
sudo docker run -p 8001:8000 -v $(pwd):/var/www/html/mountain-bird --name mountain-bird -d mountain-bird
echo '*********************************************'
