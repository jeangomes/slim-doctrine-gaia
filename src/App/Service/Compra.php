<?php

namespace App\Service;

use App\Service;
use App\Entity\Compra as CompraEntity;
use App\Service\CompraItem as CompraItemService;
use App\Service\CompraPassagem as CompraPassagemService;

class Compra extends Service {

    /**
     * @param $id
     * @return object
     */
    public function getCompra($id) {
        /**
         * @var \App\Entity\Compra $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\Compra');
        $user = $repository->find($id);

        if ($user === null) {
            return null;
        }

        return array(
            'id' => $user->getId(),
            //'created' => $user->getCreated(),
            //'updated' => $user->getUpdated(),
            'titulo' => $user->getTitulo(),
            'ndepagina' => $user->getNdepagina()
        );
    }

    /**
     * @return array|null
     */
    public function getCompras() {
        $repository = $this->getEntityManager()->getRepository('App\Entity\Compra');
        $users = $repository->findAll();

        if (empty($users)) {
            return null;
        }

        /**
         * @var \App\Entity\Compra $user
         */
        $data = array();
        foreach ($users as $user) {
            $data[] = array(
                'id' => $user->getId(),
                'data_compra' => date('d/m/Y H:i', strtotime($user->getData_compra())),
                'data_compra_order' => $user->getData_compra(),
                'subtotal' => $user->getSubtotal(),
                'desconto' => $user->getDesconto(),
                'total' => $user->getTotal(),
                'dinheiro' => $user->getDinheiro(),
                'troco' => $user->getTroco(),
                'estabelecimento' => $user->getEstabelecimento()->getNome(),
            );
        }

        return $data;
    }

    /**
     * @param $email
     * @param $password
     * @return array
     */
    public function createCompra($params) {
        $compra = new CompraEntity();
        $estabelecimento = $this->getEntityManager()->getRepository('App\Entity\Estabelecimento')->find($params["id_estabelecimento"]);
        $compra->setEstabelecimento($estabelecimento);
        $compra->setData_compra(date("Y-m-d H:i:s", strtotime($params["data_compra"])));
        $compra->setData_pagamento(date("Y-m-d H:i:s", strtotime($params["data_compra"])));
        $compra->setData_cadastro(date("Y-m-d H:i:s"));
        $compra->setSubtotal($params["subtotal"]);
        $compra->setDesconto($params["desconto"]);
        $compra->setTotal($params["valor_total"]);
        $compra->setDinheiro($params["dinheiro"]);
        $compra->setTroco($params["troco"]);
        $compra->setForma_pagamento($params["forma_pagamento"]);
        $compra->setObs($params["obs"]);
        $compra->setTags($params["tags"]);
        $compra->setVendedor_caixa($params["vendedor_caixa"]);
        $compra->setImposto($params["imposto"]);

        $this->getEntityManager()->persist($compra);
        $this->getEntityManager()->flush();

        $item = new CompraItemService($this->getEntityManager());
        $item->createItem($compra->getId(), $params);

        if (isset($params["de_onde"]) && !empty($params["de_onde"])) {
            if (isset($params["destino_real"]) && !empty($params["destino_real"])) {
                $passagem = new CompraPassagemService($this->getEntityManager());
                $passagem->createPassagem($compra->getId(), $params);
            }
        }

        return array(
            'id' => $compra->getId()
                //'created' => $user->getCreated(),
                //'updated' => $user->getUpdated(),
        );
    }

    /**
     * @param $id
     * @param $email
     * @param $password
     * @return array|null
     */
    public function updateCompra($id, $nome, $nacionalidade, $sexo) {
        /**
         * @var \App\Entity\Compra $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\Compra');
        $user = $repository->find($id);

        if ($user === null) {
            return null;
        }

        $user->setNome($nome);
        $user->setNacionalidade($nacionalidade);
        $user->setSexo($sexo);

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();

        return array(
            'id' => $user->getId(),
            'nome' => $user->getNome()
        );
    }

    public function deleteCompra($id) {
        /**
         * @var \App\Entity\Compra $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\Compra');
        $user = $repository->find($id);

        if ($user === null) {
            return false;
        }

        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush();

        return true;
    }

}
