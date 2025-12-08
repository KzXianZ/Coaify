# ---- Build Stage ----
FROM oven/bun AS builder

WORKDIR /app

COPY package.json bun.lockb ./
RUN bun install

COPY . .

# 產生 Svelte 靜態檔案
RUN bun run build


# ---- Production Stage ----
FROM nginx:stable-alpine

# 將 Svelte 編譯結果放到 nginx 靜態主機
COPY --from=builder /app/build /usr/share/nginx/html

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
