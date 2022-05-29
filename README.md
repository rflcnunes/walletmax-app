# Walletmax API

API developed for a personal development project with some main points.

- [x] Design Pattern
    - [x] Services
    - [x] Repositories
    - [x] Observers
- [x] Database
    - [x] Eloquent ORM
- [ ] Tests


## Init Project
Requirements:

- Docker
- Postman or [Wallet](https://github.com/rflcnunes/walletmax_front) Front End

Up

    ./vendor/bin/sail up -d


Down

    ./vendor/bin/sail down


Bash

    ./vendor/bin/sail bash

Migrations

    php artisan migrate


Insert users

    php artisan db:seed --class=UserSeeder

## Walletmax
Postman Collection: [JSON](https://www.getpostman.com/collections/8b870586e90cd7067caa)

URL: `localhost/api/login` <br>
Method: `POST` <br>
    Body: <br>
    x-www-form-urlencoded <br>
    email: `tester@test.com` <br>
    password: `123456` <br>

## Success

![Success_login](https://i.ibb.co/H4hsjkB/Screen-Shot-2022-05-29-at-8-24-01-PM.png)
Insert the token in the Postman Collection to insert the other URLs
![enter image description here](https://i.ibb.co/1GFYTy7/Screen-Shot-2022-05-29-at-8-45-55-PM.png)


# Crédito:
URL: `localhost/api/credit` <br>
Method: `POST` <br>
Headers: <br>
Content-Type : application/json <br>
Body: *raw* <br>

       {
        "value":  {{ number }} 
        }

## Success response:

![Success_credit](https://i.ibb.co/cTGSBsF/Screen-Shot-2022-05-29-at-8-25-51-PM.png)

# Débito:
URL: `localhost/api/debit` <br>
Method: `POST` <br>
Headers: <br>
Content-Type : application/json <br>
Body: *raw* <br>

    {
    "value":  {{ number }} 
    }


## Success response:

![Response_success_api](https://i.ibb.co/CWchM2J/Screen-Shot-2022-05-29-at-8-19-13-PM.png)

## Possible errors:

If the debit amount is greater than the amount in the account <br>
![insufficient_funds](https://i.ibb.co/GR6y1Jn/Screen-Shot-2022-05-29-at-8-27-08-PM.png)

If the debit amount is zero or less <br>
![null_value](https://i.ibb.co/BKNmxxn/Screen-Shot-2022-05-29-at-8-28-22-PM.png)

# Balance by User

URL: `localhost/api/balance/json`  <br>
Method: `GET`  <br>

## Success

![enter image description here](https://i.ibb.co/WHPJxwK/Screen-Shot-2022-05-29-at-8-38-41-PM.png)

# Extract
URL: `localhost/api/historic`  <br>
Method: `GET`  <br>

## Success
![enter image description here](https://i.ibb.co/9rkzk2K/Screen-Shot-2022-05-29-at-8-43-47-PM.png)
