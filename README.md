# Laravel svelte beer api

Questo progetto consente agli utenti di autenticarsi e visualizzare un elenco di birre provenienti dalla Punk API.

## Caratteristiche Principali

1. **Autenticazione**: Gli utenti possono accedere con username e password. Una volta autenticati, ricevono il token.
2. **Visualizzazione Birre**: Gli utenti autenticati possono recuperare e visualizzare un elenco paginato di birre dalla Punk API.

## Implementazione

- Il progetto utilizza il framework Laravel per il backend e Svelte per la parte frontend.
- L'autenticazione viene gestita nel controller `app/Http/Controllers/Auth/AuthController.php`, che restituisce un token all'utente dopo l'accesso riuscito da utilizzare nelle seguenti chiamate api.
- L'elenco delle birre viene gestito dal controller `app/Http/Controllers/BeerController.php`, che fa da proxy alla Punk API usando le rotte api di Laravel Sanctum.
- La visualizzazione delle birre e del login è gestita dai componenti Svelte, il componente principale si trova in `resources/js/App.svelte` gli altri componenti si trovano in `resources/js/Components`.
- L'aspetto visivo dell'applicazione è curato utilizzando [Tailwind CSS]('https://tailwindcss.com/') e [Skeleton UI]('https://www.skeleton.de'), una libreria UI per [Svelte]('https://svelte.dev/').

## Test

- Il progetto utilizza [PestPHP]('https://pestphp.com/') per i test.
- Ci sono test specifici per verificare sia l'autenticazione che la capacità di recuperare l'elenco delle birre.
- I test si assicurano che solo gli utenti autenticati possano accedere alle informazioni sulle birre e che vengano gestiti correttamente gli errori di autenticazione.
- I due test si trovano: `tests/Feature/BeerApiTest.php` e `tests/Feature/LoginTest.php`
- Una volta eseguito il setup del progetto basterà lanciare il comando `./vendor/bin/sail test` per eseguire i test.

## Avviare il progetto

Installare dependencies PHP
```shell
composer i 
```
Dopo aver installato le dependencies possiamo creare e avviare il container docker con il comando
```shell
./vendor/bin/sail up
```
E fare il seeding del database con
```shell
./vendor/bin/sail artisan db:seed
```
Una volta avviato il container possiamo procedere a installare le dipendenze front end e builder gli assets
```shell
npm i && npm run build
```


Andare all'indirizzo http://spin-up.test/ || http://localhost/ eseguire il login, ora dovreste essere in grado di vedere la lista di birre.

### Stack

<div class="flex">
<img style="height: 50px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/985px-Laravel.svg.png">
<img style="height: 50px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Svelte_Logo.svg/1200px-Svelte_Logo.svg.png">
<img style="height: 50px" src="https://pbs.twimg.com/profile_images/1587479781544759297/TINbbJLC_400x400.png">
</div>


