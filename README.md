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
  | METHOD | ROUTE | FUNCTIONALITY |
  | ------- | ----- | ------------- |
  | *GET* | ```/offres``` | _liste des offres_|
  | *POST* | ```/offres/create``` | _creation d'une offre_|
  | *GET* | ```/offres/{id}``` | _details sur une offre_|
  | *GET/PUT* | ```/offres/{id}/edit``` | _modifier une offre_|
  | *DELETE* | ```/offres/{id}``` | _supprimer une offre_|
  
 ## SCREENS:
![Capture](https://user-images.githubusercontent.com/26094313/215843709-17b91369-8398-4327-b90c-bb960a4389ba.PNG)
![Capture2](https://user-images.githubusercontent.com/26094313/215843716-101906e0-d335-4ac7-b770-6f29d243ee78.PNG)
![Capture3](https://user-images.githubusercontent.com/26094313/215843720-9ebad3ba-ecfc-4b95-99a0-c28ea11a6f96.PNG)
![Capture5](https://user-images.githubusercontent.com/26094313/215843723-456f098d-221a-4be6-a419-20d9ba28582f.PNG)
