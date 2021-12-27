<?php

declare(strict_types=1);

use Firebase\JWT\JWT;

require_once('vendor/autoload.php');
require_once('database.php');
$username = $_POST['username'];
$pdo = startPDO();
$request = $pdo->prepare("SELECT username, password FROM `users` WHERE username = ?");
$request->execute(array($username));
$result = $request->fetchAll(PDO::FETCH_ASSOC);
json_encode($username);
json_encode($result);
// The plain text password to be hashed
  // $plaintext_password = "Sanae4@123#";
  //
  // // The hash of the password that
  // // can be stored in the database
  // $hash = password_hash($plaintext_password,
  //         PASSWORD_DEFAULT);
  //
  // // Print the generated hash
  // echo "Generated hash: ".$hash;
  die();
// Validate the credentials against a database, or other data store.
// ...
// Store the string into variable
$password = 'Password';

// Use password_hash() function to
// create a password hash
$hash_default_salt = password_hash($password,
                            PASSWORD_DEFAULT);

$hash_variable_salt = password_hash($password,
        PASSWORD_DEFAULT, array('cost' => 9));

// Use password_verify() function to
// verify the password matches
// echo password_verify('Password',
//             $hash_default_salt ) . "<br>";
//
// echo password_verify('Password',
//             $hash_variable_salt ) . "<br>";
//
// echo password_verify('Password123',
//             $hash_default_salt );
// For the purposes of this example, we'll assume that they're valid
$hasValidCredentials = true;

if ($hasValidCredentials) {
    $secretKey  = 'bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew=';
    $tokenId    = base64_encode(random_bytes(16));
    $issuedAt   = new DateTimeImmutable();
    $expire     = $issuedAt->modify('+6 minutes')->getTimestamp();      // Add 60 seconds
    $serverName = "your.domain.name";
    $username   = "username";                                           // Retrieved from filtered POST data

    // Create the token as an array
    $data = [
        'iat'  => $issuedAt->getTimestamp(),    // Issued at: time when the token was generated
        'jti'  => $tokenId,                     // Json Token Id: an unique identifier for the token
        'iss'  => $serverName,                  // Issuer
        'nbf'  => $issuedAt->getTimestamp(),    // Not before
        'exp'  => $expire,                      // Expire
        'data' => [                             // Data related to the signer user
            'userName' => $username,            // User name
        ]
    ];

    // Encode the array to a JWT string.
    json_encode(JWT::encode(
        $data,      //Data to be encoded in the JWT
        $secretKey, // The signing key
        'HS512'     // Algorithm used to sign the token, see https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40#section-3
    ));
}
