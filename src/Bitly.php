<?php
namespace Echevarria\Bitly;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;


/**
 * This is the bitly class.
 *
 * It's responsible for communicatition with Bitly API
 * 
 */
class Bitly {

    /**
     * Client Token
     * 
     * @var string
     */
    private $token;

    /**
     * Create a new bitly instance.
     *
     * @param string $token 
     * 
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Returns the short link
     *
     * @param string $long_url
     *
     * @return string
     */

    public function shorten($long_url) {
        $client = new GuzzleHttpClient();

        $data = ['long_url' => 'https://awari.com.br'];

        try {
            $response = $client->post('https://api-ssl.bitly.com/v4/shorten', [
                'headers' => [
                    'Content-type' => 'application/json; charset=utf-8',
                    'Authorization' => 'Bearer ' . $this->token,
                    'Accept'        => 'application/json'
                ],
                'json' => ['long_url' => $long_url]
            ]);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                return 'Error: invalid url';
            }
            $responseBodyAsString = json_decode($response->getBody()->getContents());
            return 'Erro: ' .  $responseBodyAsString->message . '\n';
        }

        $responseBodyAsString = json_decode($response->getBody()->getContents());

        return $responseBodyAsString->link;
    }
}