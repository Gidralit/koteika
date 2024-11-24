# Используем образ Node.js в качестве базового
FROM node:latest AS build

# Устанавливаем рабочую директорию в контейнере
WORKDIR /app

# Копируем package.json и package-lock.json
COPY package*.json ./

# Устанавливаем зависимости
RUN npm install

# Копируем остальные файлы проекта
COPY . .

# Выполняем сборку проекта, если это необходимо
RUN npm run build

# Используем образ nginx для развертывания
FROM nginx:alpine

# Копируем конфигурацию для nginx
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Копируем результаты сборки из предыдущего этапа
COPY --from=build /app/dist /usr/share/nginx/html

# Открываем порт 80
EXPOSE 80