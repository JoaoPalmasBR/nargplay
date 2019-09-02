<?php
// login.php

require 'vendor/autoload.php';
use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'joaopalmas.auth0.com',
  'client_id' => '1BO1Z5f66MHfFeG0loAi7PKpR1o5SUcW',
  'client_secret' => 'YmxdmfS4U1AaOe0hp0X6ipQvDkzS5l2EIMjYMrotJYR-N1mQzEp1e2AV1h5_mD2u',
  'redirect_uri' => 'https://localhost:80/callback',
  'scope' => 'openid profile email',
]);

$auth0->login();