<?php

namespace App\Resource;

use App\Resource;
use App\Service\Compra as CompraService;

class Compra extends Resource {

    /**
     * @var \App\Service\Compra
     */
    private $livroService;

    /**
     * Get compra service
     */
    public function init() {
        $this->setCompraService(new CompraService($this->getEntityManager()));
    }

    /**
     * @param null $id
     */
    public function get($id = null) {
        if ($id === null) {
            $data = $this->getCompraService()->getCompras();
        } else {
            $data = $this->getCompraService()->getCompra($id);
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
     * Create compra
     */
    public function post() {
        $params = $this->getSlim()->request()->getBody();
        $compra = $this->getCompraService()->createCompra(json_decode($params, true));
        //self::response(self::STATUS_CREATED, array('compra', $compra));
        self::response(self::STATUS_CREATED, $compra);
    }

    /**
     * Update compra
     */
    public function put($id) {
        $nome = $this->getSlim()->request()->params('nome');
        $nacionalidade = $this->getSlim()->request()->params('nacionalidade');
        $sexo = $this->getSlim()->request()->params('sexo');

        if (empty($nome) && empty($nacionalidade) || $nome === null && $nacionalidade === null) {
            self::response(self::STATUS_BAD_REQUEST);
            return;
        }

        $compra = $this->getCompraService()->updateCompra($id, $nome, $nacionalidade, $sexo);

        if ($compra === null) {
            self::response(self::STATUS_NOT_IMPLEMENTED);
            return;
        }

        self::response(self::STATUS_NO_CONTENT);
    }

    /**
     * @param $id
     */
    public function delete($id) {
        $status = $this->getCompraService()->deleteCompra($id);

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
     * @return \App\Service\Compra
     */
    public function getCompraService() {
        return $this->compraService;
    }

    /**
     * @param \App\Service\Compra $compraService
     */
    public function setCompraService($compraService) {
        $this->compraService = $compraService;
    }

    /**
     * @return array
     */
    public function getOptions() {
        return $this->options;
    }

}
