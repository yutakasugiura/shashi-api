#!/bin/sh

#Laravel+Nust.js(ShashiAPI)をローカル完了で構築する際のコマンド

npm run dev

php artisan serve

php artisan migrate:refresh --seed