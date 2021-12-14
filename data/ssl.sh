#!/bin/bash
cd ./data
if ! [ -d ./ssl ]; then
    echo "Create directory /data/ssl"
    mkdir ./ssl
    cd ./ssl
    echo "Generate ssl"
    openssl req -newkey rsa:2048 -sha256 -nodes -keyout docker.loc.key -x509 -days 1000 -out docker.loc.crt -subj "/C=RU/ST=Moscow/L=KP/O=Dr.Petryashin/CN=$1"
fi
