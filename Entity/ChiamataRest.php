<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 11/2/16
 * Time: 12:41 PM
 */

namespace Services\Bundle\Rest\Entity;

/**
 * Class ChiamataRest
 * @package ServicesBundle\Entity
 */
class ChiamataRest
{

    /**
     * @var
     */
    private $url;

    /**
     * @var
     */
    private $login;

    /**
     * @var
     */
    private $password;

    /**
     * @var
     */
    private $chiamante;

    /**
     * @var
     */
    private $json;

    /**
     * @var
     */
    private $tipoChiamata;

    /**
     *
     * Questo metodo effettua una chiamata rest con decodifica in output sotto autenticazione all'url passato, restituisce un array decodificato dal json di risposta, controlla anche se c'è stato un errore logico ed in caso solleva un'eccezione
     * Se viene passato un tipo chiamata questo può assumere i seguenti valori
     * GET
     * POST
     * PUT
     *
     * @return mixed|string
     * @throws \Exception
     */
    public function chiamataRestDecodificata() {

        $url=$this->url;
        $login=$this->login;
        $password=$this->password;
        $chiamante=$this->chiamante;
        $json=$this->json;
        $tipoChiamata=$this->tipoChiamata;

        $ritorno="";
        $jsonDecodificato="";

        //Tolgo gli spazi
        $url = str_replace(" ","%20",$url);
        //$url=urlencode($url);
        $ch = curl_init();

        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $tipoChiamata);

        //Se è post o patch di default deve passargli un json
        if ($tipoChiamata=="POST" || $tipoChiamata=="PUT") {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($json))
            );
        }

        if (!empty($login)) {
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
        }

        //Gli passo il json se valorizzato
        if (!empty($json)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        }

        $ritorno=curl_exec($ch);

        // Check if an error occurred
        if(curl_errno($ch)) {
            curl_close($ch);
            throw new \Exception("Risposta negativa alla seguente chiamata:".$chiamante." Il messaggio di ritorno è:".$ritorno);
        }

        // Get HTTP response code
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($code!=200 && $code!=201 && $code!=202)
            throw new \Exception("Risposta negativa alla seguente chiamata:".$chiamante." Il codice di ritorno è:".$code." e il messaggio:".$ritorno);

        $jsonDecodificato=json_decode($ritorno);

        if (!$jsonDecodificato->success) {
            throw new \Exception("Risposta negativa alla seguente chiamata:".$chiamante.". Le informazioni restituite dal Web Service sono le seguenti:".
                $jsonDecodificato->message);
        }

        return $jsonDecodificato;
    }

    /**
     *
     * Questo metodo effettua una chiamata rest sotto autenticazione all'url passato, restituisce un array decodificato dal json di risposta, controlla anche se c'è stato un errore logico ed in caso solleva un'eccezione
     * Se viene passato un tipo chiamata questo può assumere i seguenti valori
     * GET
     * POST
     * PUT
     *
     * @return mixed|string
     * @throws \Exception
     */
    public function chiamataRest() {

        $url=$this->url;
        $login=$this->login;
        $password=$this->password;
        $chiamante=$this->chiamante;
        $json=$this->json;
        $tipoChiamata=$this->tipoChiamata;

        $ritorno="";
        $jsonDecodificato="";

        //Tolgo gli spazi
        $url = str_replace(" ","%20",$url);
        //$url=urlencode($url);
        $ch = curl_init();

        //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $tipoChiamata);

        //Se è post o patch di default deve passargli un json
        if ($tipoChiamata=="POST" || $tipoChiamata=="PUT") {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($json))
            );
        }

        if (!empty($login)) {
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
        }

        //Gli passo il json se valorizzato
        if (!empty($json)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        }

        $ritorno=curl_exec($ch);

        // Check if an error occurred
        if(curl_errno($ch)) {
            curl_close($ch);
            throw new \Exception("Risposta negativa alla seguente chiamata:".$chiamante." Il messaggio di ritorno è:".$ritorno);
        }

        // Get HTTP response code
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($code!=200 && $code!=201 && $code!=202)
            throw new \Exception("Risposta negativa alla seguente chiamata:".$chiamante." Il codice di ritorno è:".$code." e il messaggio:".$ritorno);

        $jsonDecodificato=json_decode($ritorno);

        if (!$jsonDecodificato->success) {
            throw new \Exception("Risposta negativa alla seguente chiamata:".$chiamante.". Le informazioni restituite dal Web Service sono le seguenti:".
                $jsonDecodificato->message);
        }

        return $ritorno;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getChiamante()
    {
        return $this->chiamante;
    }

    /**
     * @param mixed $chiamante
     */
    public function setChiamante($chiamante)
    {
        $this->chiamante = $chiamante;
    }

    /**
     * @return mixed
     */
    public function getJson()
    {
        return $this->json;
    }

    /**
     * @param mixed $json
     */
    public function setJson($json)
    {
        $this->json = $json;
    }

    /**
     * @return mixed
     */
    public function getTipoChiamata()
    {
        return $this->tipoChiamata;
    }

    /**
     * @param mixed $tipoChiamata
     */
    public function setTipoChiamata($tipoChiamata)
    {
        $this->tipoChiamata = $tipoChiamata;
    }


}