# Development image
FROM node:20-alpine

WORKDIR /app

# Expose Vite dev server port
EXPOSE 5173

CMD ["npm", "run", "dev", "--", "--host", "0.0.0.0"]