#!/bin/bash

php artisan migrate > /dev/null

while [ $? -eq 1 ]; then
    echo "Unable to artisan migrate, database server is still down, i guess... Retry after 5 seconds..."
    sleep 5
    php artisan migrate > /dev/null
done
