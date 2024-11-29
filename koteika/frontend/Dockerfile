# Используем образ Node.js в качестве базового
FROM node:latest

# Устанавливаем рабочую директорию в контейнере
WORKDIR /app

# Копируем package.json и package-lock.json
COPY package*.json ./
COPY . .

# Устанавливаем зависимостиdoc
RUN npm install

CMD ["npm","run", "dev"]
