<?php
class GeoApi 
{
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getConverter(string $from, string $to, string $amt): ?array
    {
        $url = "https://api.getgeoapi.com/v2/currency/convert?api_key={$this->apiKey}&format=json&from={$from}&to={$to}&amount={$amt}";//initialiser url avec les parametres
        $curl = curl_init($url);/*curl_init permet d'appeler une url d'initialiser l API*/
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); /*curl_setopt pour la sécurité */
        $response = curl_exec($curl); /*curl_exec permet d'executer la demande de l'api et afficher le resultat*/
        if ($response === FALSE) 
            {
                return null;
            }
            else 
            {
                $data = json_decode($response, true); /* permet de décoder la réponse en json */
                $results = [
                    'date' => $data['updated_date'],
                    'name' => $data['base_currency_name'],
                    'amount' => $data['amount'],
                    'name_to' => $data['rates'][$to]['currency_name'],
                    'rates' => $data['rates'][$to]['rate_for_amount']
                ];
                return $results;
            }
            curl_close($curl); /*curl_close permet de fermer l'appel à la demande de l'api */
    }

    public function getList(): ?array 
    {
        $url = "https://api.getgeoapi.com/v2/currency/list?api_key={$this->apiKey}&format=json";//initialiser url avec les parametres
        $curl = curl_init($url);/*curl_init permet d'appeler une url d'initialiser l API*/
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); /*curl_setopt pour la sécurité */
        $response = curl_exec($curl); /*curl_exec permet d'executer la demande de l'api et afficher le resultat*/
        if ($response === FALSE)
            {
                return null;
            }
            else 
            {
                $data = json_decode($response, true); /* permet de décoder la réponse en json */
                $results = [
                    'devise' => $data['currencies']
                ];
                return $results;
            }
            curl_close($curl); /*curl_close permet de fermer l'appel à la demande de l'api */
    }
}