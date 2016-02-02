<?php

namespace App\Service;

use App\Service;
use App\Entity\CompraPassagem as CompraPassagemEntity;

class CompraPassagem extends Service {

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
    public function createPassagem($id_compra, $params) {
        $passagem = new CompraPassagemEntity();
        $compra = $this->getEntityManager()->getRepository('App\Entity\Compra')->find($id_compra);
        $passagem->setCompra($compra);
        $passagem->setDataViagem(date("Y-m-d H:i", strtotime($params["data_viagem"])));
        $passagem->setDeOnde($params["de_onde"]);
        $passagem->setDestinoPassagem($params["destino_passagem"]);
        $passagem->setDestinoComprado($params["destino_comprado"]);
        $passagem->setDestinoReal($params["destino_real"]);
        $passagem->setDataViagem($params["data_viagem"]);
        $passagem->setPoltrona($params["poltrona"]);
        $passagem->setMotivoViagem($params["motivo_viagem"]);

        $this->getEntityManager()->persist($passagem);
        $this->getEntityManager()->flush();

        return array(
            'id' => $passagem->getId()
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
