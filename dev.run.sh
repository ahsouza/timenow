#!/usr/bin/env bash
chmod +x dev.server.sh
rm -rf /api/vendor
docker build -t ahsouza/vue-laravel-spa .
docker run -d --name ahsouza -v $(pwd):/var/www -p 8000:8000 ahsouza/vue-laravel-spa
docker exec -it ahsouza bash dev.server.sh
