#!/usr/bin/env bash
docker build -t ahsouza/timenow-front -f vue.Dockerfile .
docker run -it -p 8080:8080 --rm --name timenow-dev-vue ahsouza/timenow-front
# docker exec -it timenow-dev bash
