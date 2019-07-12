#!/usr/bin/env bash
docker build -t ahsouza/timenow .
docker run -it -p 8080:8080 --rm --name timenow-dev ahsouza/timenow
# docker exec -it timenow-dev bash
