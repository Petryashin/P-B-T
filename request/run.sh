#!/bin/sh
while [ 1 = 1 ]
  do
    sleep 60
    curl -X POST  http://nginx/api/sheduller
  done