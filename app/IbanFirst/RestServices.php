<?php
namespace App\IbanFirst;

use Exception;
use GuzzleHttp\Client;

class RestServices
{
    private $client;
    private $baseUri;
    private $userName;
    private $password;

    //inject httpGuzzle client in the rest service
    public function __construct(Client $client)
    {

        $this->client = $client;
    }

    //get all with query options
    public function all($url, $query = [])
    {
        return $this->endpointRequest($url, $query);
    }
    //get alone  by id
    public function findById($url, $id)
    {
        return $this->endpointRequest($url . $id);
    }

    public function endpointRequest($url, $query = [])
    {
        try {

            $response = $this->client->request('GET', $url, [
                'query' => $query,
            ]);
        } catch (\Exception $e) {
            return [];
        }

        return $this->response_handler($response->getBody()->getContents());
    }

    public function response_handler($response)
    {
        if ($response) {
            return json_decode($response);
        }

        return [];
    }

    private function getHeaders()
    {
        $nonce = substr(sha1((string) time()), 0, 15);
        $nonce64 = base64_encode($nonce);
        $date = new \DateTime();
        $formattedDate = $date->format('Y-m-d\TH:i:s\Z');
        $digest = base64_encode(sha1($nonce . $formattedDate . $this->password, true));
        $header = sprintf('UsernameToken Username="%s", PasswordDigest="%s", Nonce="%s", Created="%s"', $this->userName, $digest, $nonce64, $formattedDate);

        return [
            'X-WSSE' => $header,
            'Content-Type' => 'application/json',
        ];
    }
}
