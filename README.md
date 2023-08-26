## overview

Questa applicazione web è stata sviluppata con Laravel e fornisce un sistema di autenticazione che, una volta effettuato il login, restituisce un token all'utente. Utilizzando questo token, gli utenti possono accedere a un API esposta dall'applicazione che funge da proxy verso Punk API, mostrando una lista paginata di birre.

## Set up


installare le dependencies
```shell
composer i
```
Successivamente avvia il container docker
```shell
./vendor/bin/sail up
```
e installare le dependecies del frontend e buildare 
```shell
npm i  && npm run buid 
```

## Overview

### Backend
#### login
La logica del login si in ```app/Http/Controllers/Auth/AuthController.php``` e usa laravel sanctum per generare il token e loggare l'utente  

