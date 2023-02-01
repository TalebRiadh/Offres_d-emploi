# Offres_d-emploi
 ## TECHs:
 * SYMFONY5/PHP7
 * DOCKER
 * POSTGRES
 * BOOTSTRAP
 ## STEPS: 
* composer install
* npm install
* npm run dev
* docker-compose up --build
* docker-compose exec php php bin/console doctrine:database:create
* docker-compose exec php php bin/console make:migration
* docker-compose exec php php bin/console doctrine:migrations:migrate
 ## ENTITIES:
 ![Capture6](https://user-images.githubusercontent.com/26094313/216023776-c0e6ffb1-441f-4dd3-8b95-08c5afbe5a72.PNG)
 ## ROUTES:
  | METHOD | ROUTE | FUNCTIONALITY |ACCESS|
  | ------- | ----- | ------------- | ------------- |
  | *POST* | ```/user/signup/``` | _Register new user_| _All users_|
  | *POST* | ```/user/login/``` | _login user_| _All users_|
  | *GET* | ```/user/``` | _Get user details_| _All users_|
  | *POST* | ```/user/send-sms/{phone_number}``` | _Check if submitted phone number is a valid phone number and sent OTP._| _All users_|
  | *POST* | ```/user/verify-phone/{otp}``` | _Check if submitted phone number and OTP matches and verify the user._| _All users_|
  | *GET* | ```/user/address/``` | _List and Retrieve user addresses_| _All users_|
  | *GET* | ```/user/address/{id}/``` | _Retrieve user address_| _All users_|
  | *POST* | ```/account-confirm-email/{key}``` | _confirm email with key sent_| _All users_|
  | *GET* | ```/resend-email/``` | _send key to an email_| _All users_|
  | *GET* | ```/products/``` | _Get all products_|_All users_|
 
 ## SCREENS:
![Capture](https://user-images.githubusercontent.com/26094313/215843709-17b91369-8398-4327-b90c-bb960a4389ba.PNG)
![Capture2](https://user-images.githubusercontent.com/26094313/215843716-101906e0-d335-4ac7-b770-6f29d243ee78.PNG)
![Capture3](https://user-images.githubusercontent.com/26094313/215843720-9ebad3ba-ecfc-4b95-99a0-c28ea11a6f96.PNG)
![Capture5](https://user-images.githubusercontent.com/26094313/215843723-456f098d-221a-4be6-a419-20d9ba28582f.PNG)
