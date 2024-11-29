# Используем образ Node.js в качестве базового
FROM node:latest

# Устанавливаем рабочую директорию в контейнере
WORKDIR /app

# Копируем package.json и package-lock.json
COPY package*.json ./

ARG INSTALL_DEPENDENCIES=true
RUN if [ "$INSTALL_DEPENDENCIES" = "true" ]; then npm install; fi

# Устанавливаем зависимостиdoc
RUN npm install

COPY . .

CMD ["npm","run", "dev"]
