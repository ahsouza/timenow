#!/usr/bin/env bash
chmod +x dev.serve.sh
rm -rf .docker/spa/dist/
cd .docker/spa/
npm run dev

cd ..
cd ..
docker build -t ahsouza/timenow .
docker run -d --name timenow-dev -v $(pwd):/var/www -p 8000:8000 ahsouza/timenow
docker exec -it timenow-dev bash
