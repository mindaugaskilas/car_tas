FROM node:16 as dev-stage
WORKDIR /app
COPY package*.json ./
RUN mkdir -p node_modules/.cache && chmod -R 777 node_modules/.cache
RUN npm install
COPY ./ .

EXPOSE 8080

CMD [ "npm", "run", "serve"]
