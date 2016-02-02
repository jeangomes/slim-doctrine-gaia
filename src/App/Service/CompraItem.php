<?php

namespace App\Service;

use App\Service;
use App\Entity\CompraItem as CompraItemEntity;

class CompraItem extends Service {

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
    public function getItens($params) {
        $repository = $this->getEntityManager()->getRepository('App\Entity\CompraItem');
        $result = $repository->createQueryBuilder('o')
                ->where('o.descricao LIKE :product')
                ->setParameter('product', $params["s"] . '%')
                ->getQuery()
                ->getResult();

        if (empty($result)) {
            return null;
        }

        /**
         * @var \App\Entity\Compra $user
         */
        $data = array();
        foreach ($result as $user) {
            $data[] = array(
                'name' => $user->getDescricao()
            );
        }
        return $data;
    }

    /**
     * @param $id_compra
     * @param $params
     * @return array
     */
    public function createItem($id_compra, $params) {



        foreach ($params["itensCupom"] as $item) {
            $user = new CompraItemEntity();
            $compra = $this->getEntityManager()->getRepository('App\Entity\Compra')->find($id_compra);
            $user->setCompra($compra);
            $user->setValor_unitario($item["vVal_unit"]);
            $user->setQtd($item["vQtd"]);
            $user->setDesconto($item["vDesconto"]);
            $user->setValor_total($item["vTotal"]);
            //$user->setValor_nota();
            $user->setDescricao($item["vDescricao"]);

            $this->getEntityManager()->persist($user);
            $this->getEntityManager()->flush();
        }



        return array(
            'id' => $user->getId()
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
