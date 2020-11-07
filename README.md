# Google Places API

### Controllers:

1. IndexController.php

### Models:

None

### Views:

1. views/places/index.blade.php

### Additional Files:

1. public/js/places-handler.js
2. public/css/index.css
3. resources/lang/gb/messages.php

### MySQL Database:

None

## Installation

1. Clone the project: git clone
2. cd <project-root-directory> (the folder containing the /app/ directory)
3. Clone laradock: git clone https://github.com/Laradock/laradock.git
4. Follow overview/instructions here: https://laradock.io/
5. Spin up the project containers: docker-compose up -d nginx mysql workspace
6. Composer update
7. Rename file <project-root>/env-example to .env
8. php artisan key:generate
9. Replace the GOOGLE_PLACES_API_KEY in .env with your own key
10. Run the project in your browser: http://localhost/index

## API Reference

Not required

## Contributors

Donal Lynch <donal.lynch.msc@gmail.com>

## License

© 2020 Donal Lynch Software, Inc.