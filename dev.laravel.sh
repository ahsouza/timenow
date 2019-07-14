#!/usr/bin/env bash
docker build -t ahsouza/timenow-back -f laravel.Dockerfile .
docker run -it -p 8000:8000 --rm --name timenow-dev-laravel ahsouza/timenow-back
docker exec -it timenow-dev-laravel bash up.sh