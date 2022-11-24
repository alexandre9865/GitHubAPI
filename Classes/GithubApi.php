<?php
class GithubApi {

    private $urlBase = "https://api.github.com/";
    private $verbose = false;

    /**
    * Metodo que executa o CURL conforme requisição
    */
    public function executaRequisicao($link){

        try {
            $url = $this->urlBase.$link;
            $curl = curl_init();
            $headers = [
                'content-type: application/json',
                'Accept: application/vnd.github+json',
            ];

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_USERAGENT => 'GitAPI - Alexandre9865',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HEADER, 0,
                CURLOPT_CONNECTTIMEOUT => 30,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTPHEADER => $headers
            ));
            $conteudo = curl_exec($curl);

            if($this->verbose){
                echo '<hr>';
                echo "CURL_GETINFO";
                print_r(curl_getinfo($curl));
                echo '<hr>';
                echo "RESPOSTA";
                print_r($conteudo);
                print_r(json_decode($conteudo), true);
            }


            if (curl_error($curl)){
                if($this->verbose){
                    print_r(curl_error($curl));
                }
                throw new Exception("Erro na requisição ao github: " . curl_error($curl), 1);
            }else{
                curl_close($curl);
            }

            return $conteudo;

        } catch (Exception $e) {
            throw $e;
        }
    }
}
?>