## Ejucte

config access database in .env

# config count mailtrap
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=7d4e3da8d9bb63
MAIL_PASSWORD=b2e9aad343cf71
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=xhnl21@gmail.com

php artisan migrate
php artisan key:generate
php artisan db:seed --class=AdminSeeder
npm install
npm run dev
php artisan serve

### data user
user:admin@gmail.com
pass:123456789

### NOTA: create new acount

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
