<?php

namespace App\Resource;

use App\Resource;
use App\Service\Autor as AutorService;

class Autor extends Resource {

    /**
     * @var \App\Service\Autor
     */
    private $autorService;

    /**
     * Get user service
     */
    public function init() {
        $this->setAutorService(new AutorService($this->getEntityManager()));
    }

    /**
     * @param null $id
     */
    public function get($id = null) {
        if ($id === null) {
            $data = $this->getAutorService()->getAutors();
        } else {
            $data = $this->getAutorService()->getAutor($id);
        }

        if ($data === null) {
            self::response(self::STATUS_NOT_FOUND);
            return;
        }

        //$response = array('autor' => $data);
        $response = $data;
        self::response(self::STATUS_OK, $response);
    }

    /**
     * Create user
     */
    public function post() {
        $params = $this->getSlim()->request()->getBody();
        $dados = json_decode($params, true);
        if (empty($dados['nome']) || $dados === null) {
            self::response(self::STATUS_BAD_REQUEST);
            return;
        }
        $user = $this->getAutorService()->createAutor($dados['nome'], $dados['nacionalidade'], $dados['sexo']);
        //self::response(self::STATUS_CREATED, array('user', $user));
        self::response(self::STATUS_CREATED, $user);
    }

    /**
     * Update user
     */
    public function put($id) {
        $nome = $this->getSlim()->request()->params('nome');
        $nacionalidade = $this->getSlim()->request()->params('nacionalidade');
        $sexo = $this->getSlim()->request()->params('sexo');

        if (empty($nome) && empty($nacionalidade) || $nome === null && $nacionalidade === null) {
            self::response(self::STATUS_BAD_REQUEST);
            return;
        }

        $user = $this->getAutorService()->updateAutor($id, $nome, $nacionalidade, $sexo);

        if ($user === null) {
            self::response(self::STATUS_NOT_IMPLEMENTED);
            return;
        }

        self::response(self::STATUS_NO_CONTENT);
    }

    /**
     * @param $id
     */
    public function delete($id) {
        $status = $this->getAutorService()->deleteAutor($id);

        if ($status === false) {
            self::response(self::STATUS_NOT_FOUND);
            return;
        }

        self::response(self::STATUS_OK);
    }

    /**
     * Show options in header
     */
    public function options() {
        self::response(self::STATUS_OK, array(), array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'));
    }

    /**
     * @return \App\Service\Autor
     */
    public function getAutorService() {
        return $this->userService;
    }

    /**
     * @param \App\Service\Autor $userService
     */
    public function setAutorService($userService) {
        $this->userService = $userService;
    }

    /**
     * @return array
     */
    public function getOptions() {
        return $this->options;
    }

}
