#!/usr/bin/env bash
docker build -t ahsouza/timenow-back -f laravel.Dockerfile .
docker run -it -p 9000:9000 --rm --name timenow-dev-laravel ahsouza/timenow-back