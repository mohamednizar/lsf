<?php
namespace Lib;

use Exception;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Token;

class Auth
{

    public function IssueToken($data)
    {
        $signer = new Sha256();
        $user = $data['User'];
        $token = (new Builder())->setIssuer(IIS) // Configures the issuer (iss claim)
            ->setAudience(AUD) // Configures the audience (aud claim)
            ->setId($user['user_name'], true) // Configures the id (jti claim), replicating as a header item
            ->setIssuedAt(time()) // Configures the time that the token was issue (iat claim)
        // ->setNotBefore(time() + 15) // Configures the time that the token can be used (nbf claim)
            ->setExpiration(time() + 900) // Configures the expiration time of the token (exp claim)
            ->set('uid', 1) // Configures a new claim, called "uid"
            ->sign($signer, 'testing') // creates a signature using "testing" as key
            ->getToken(); // Retrieves the generated token
        return 'Bearer ' . $token;
    }

    public function isValidToken()
    {
        $token = getBearerToken();
        try {
            $data = new ValidationData();
            $token = (new Parser())->parse((string) $token);
            return $token->validate($data);
        } catch (Exception $e) {
            exit($e-getMessage());
            return false;
        }

    }

    public function doExpire()
    {
        $token = getBearerToken();
        try {
            $data = new ValidationData();
            $token = (new Parser())->parse((string) $token);
            $data->setCurrentTime(time());
            $token->validate($data);
        } catch (Exception $e) {
            return false;
        }
    }

}
