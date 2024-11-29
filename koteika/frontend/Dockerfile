# Используем образ Node.js в качестве базового
FROM node:latest

# Устанавливаем рабочую директорию в контейнере
WORKDIR /app

# Копируем package.json и package-lock.json
COPY package*.json ./

# Устанавливаем зависимостиdoc
RUN npm install

COPY . .

CMD ["npm","run", "dev"]

