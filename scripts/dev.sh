#!/bin/bash

MAILPIT_SMTP_PORT=1025
MAILPIT_HTTP_PORT=8025

# Check if mailpit SMTP port is already in use and kill the process
if lsof -Pi :$MAILPIT_SMTP_PORT -sTCP:LISTEN -t >/dev/null 2>&1; then
  echo "Mailpit port $MAILPIT_SMTP_PORT is already in use. Cleaning up..."
  lsof -i :$MAILPIT_SMTP_PORT | grep -v COMMAND | awk '{print $2}' | xargs kill -9 2>/dev/null
  sleep 1
fi

echo "Starting dev servers:"
echo "  Laravel:   http://goal850.test"
echo "  Mailpit:   http://localhost:$MAILPIT_HTTP_PORT"
echo ""

npx concurrently \
  -c "#93c5fd,#c4b5fd,#fb7185,#fdba74" \
  "php artisan queue:listen --tries=1 --timeout=0" \
  "php artisan pail --timeout=0" \
  "npm run dev" \
  "mailpit --smtp 127.0.0.1:$MAILPIT_SMTP_PORT --listen 127.0.0.1:$MAILPIT_HTTP_PORT" \
  --names queue,logs,vite,mailpit \
  --kill-others
