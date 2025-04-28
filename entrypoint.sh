#!/bin/bash
set -e

if [[ ! -d "vendor" && "$1" != "composer"* ]]; then
  echo "Installing dependencies..."
  composer install --ignore-platform-reqs --no-interaction
fi

exec "$@"