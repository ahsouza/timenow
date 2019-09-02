FROM node:lts-alpine as build-develop
RUN npm install -g http-server
WORKDIR /app
COPY .docker/spa/package.json ./
RUN npm install --no-optional && npm cache clean --force 
COPY .docker/spa/ .

RUN npm run build
EXPOSE 8080
CMD ["http-server", "dist"]



# STAGE-PRODUCTION
# FROM nginx:stable-alpine as production-stage
# COPY --from=build-develop /app/dist /usr/share/nginx/html
# EXPOSE 80
# CMD ["nginx", "-g", "daemon off;"]