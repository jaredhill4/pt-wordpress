ARG NODE_VERSION

FROM node:${NODE_VERSION}

WORKDIR /app

COPY ./app/themes/wlion/package*.json ./

RUN npm install

CMD ["npm", "start"]