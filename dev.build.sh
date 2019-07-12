docker build -t ahsouza/timenow .

docker run -it -p 8080:80 --rm --name timenow-build ahsouza/timenow