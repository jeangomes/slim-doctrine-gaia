<?php

namespace App\Resource;

use App\Resource;
use App\Service\Livro as LivroService;

class Livro extends Resource {

    /**
     * @var \App\Service\Livro
     */
    private $livroService;

    /**
     * Get user service
     */
    public function init() {
        $this->setLivroService(new LivroService($this->getEntityManager()));
    }

    /**
     * @param null $id
     */
    public function get($id = null) {
        if ($id === null) {
            $data = $this->getLivroService()->getLivros();
        } else {
            $data = $this->getLivroService()->getLivro($id);
        }

        if ($data === null) {
            self::response(self::STATUS_NOT_FOUND);
            return;
        }

        //$response = array('livro' => $data);
        $response = $data;
        self::response(self::STATUS_OK, $response);
    }

    /**
     * Create user
     */
    public function post() {

        $nome = $this->getSlim()->request()->params('nome');
        $nacionalidade = $this->getSlim()->request()->params('nacionalidade');
        $sexo = $this->getSlim()->request()->params('sexo');
        if (empty($nome) || $nome === null) {
            self::response(self::STATUS_BAD_REQUEST);
            return;
        }
        $user = $this->getLivroService()->createLivro($nome, $nacionalidade, $sexo);
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

        $user = $this->getLivroService()->updateLivro($id, $nome, $nacionalidade, $sexo);

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
        $status = $this->getLivroService()->deleteLivro($id);

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
     * @return \App\Service\Livro
     */
    public function getLivroService() {
        return $this->userService;
    }

    /**
     * @param \App\Service\Livro $userService
     */
    public function setLivroService($userService) {
        $this->userService = $userService;
    }

    /**
     * @return array
     */
    public function getOptions() {
        return $this->options;
    }

}
