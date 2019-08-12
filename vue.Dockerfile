FROM node:lts-alpine
RUN npm install -g http-server
WORKDIR /app
COPY .docker/spa/package.json ./
RUN npm install --no-optional && npm cache clean --force 
COPY .docker/spa/ .

RUN npm run build
EXPOSE 8080
CMD ["http-server", "dist"]