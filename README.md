### API Laravel integrated to SPA Vue.JS

#### Aplicação Web - Centralizing Calls from the Time-Now Engenharia company. Business logic received by participating in Hackathon

Building...

**Testing Application in local environment**


###### Pre-Requirements

- Docker
- Linux/Windows

##### Using **Linux**

1. Create a file named **database.sqlite** in the directory: **.docker/api/database/**
2. Enter the root of the project and run the command: **./setup.sh**
3. Start scaling docker images to the laravel and vuejs environment

##### Using **Windows**

###### Dockerized Laravel API

1. Create a file named **database.sqlite** in the directory: **.docker/api/database/**
2. Enter the root of the project and build Laravel container: **docker build -t api-laravel -f laravel.Dockerfile .**
3. Run the container **docker run -d -p 8000:8000 --name dev-laravel api-laravel**
4. Enter interactive mode with the container terminal running the automated script that will migrate all data models, install required dependencies, and upload the local server: **docker exec -it dev-laravel bash up.sh**

###### Dockerized Vue.JS SPA

1. Enter the root of the project and build Vue: **docker build -t spa-vue -f vue.Dockerfile .**
2. Run the container: **docker run -d -p 8080:8080 --name dev-vue spa-vue**


Now just access from your favorite browser: http://localhost:8080

![alt](https://github.com/ahsouza/timenow/blob/master/assets/dash.png)

![alt](https://github.com/ahsouza/timenow/blob/master/assets/profile.png)

![alt](https://github.com/ahsouza/timenow/blob/master/assets/friends.png)

![alt](https://github.com/ahsouza/timenow/blob/master/assets/side.png)
