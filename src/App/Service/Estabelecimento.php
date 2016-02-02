<?php

namespace App\Service;

use App\Service;
use App\Entity\Estabelecimento as UserEntity;

class Estabelecimento extends Service {

    /**
     * @param $id
     * @return object
     */
    public function getUser($id) {
        /**
         * @var \App\Entity\User $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\Estabelecimento');
        $user = $repository->find($id);

        if ($user === null) {
            return null;
        }

        return array(
            'id_estab' => $user->getId(),
            'nome' => $user->getNome(),
        );
    }

    /**
     * @return array|null
     */
    public function getUsers($id = false) {
        $repository = $this->getEntityManager()->getRepository('App\Entity\Estabelecimento');
        $users = $repository->findAll();
        if ($id) {
            $users = $repository->findBy(array('id_categoria' => $id));
        }


        if (empty($users)) {
            return null;
        }

        /**
         * @var \App\Entity\User $user
         */
        $data = array();
        foreach ($users as $user) {
            $data[] = array(
                'id_estab' => $user->getId(),
                'nome' => $user->getNome(),
            );
        }

        return $data;
    }

    /**
     * @param $email
     * @param $password
     * @return array
     */
    public function createUser($email, $password) {
        $user = new UserEntity();
        $user->setEmail($email);
        $user->setPassword($password);

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();

        return array(
            'id' => $user->getId(),
            'created' => $user->getCreated(),
            'updated' => $user->getUpdated(),
            'email' => $user->getEmail()
        );
    }

    /**
     * @param $id
     * @param $email
     * @param $password
     * @return array|null
     */
    public function updateUser($id, $email, $password) {
        /**
         * @var \App\Entity\User $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\User');
        $user = $repository->find($id);

        if ($user === null) {
            return null;
        }

        $user->setEmail($email);
        $user->setPassword($password);
        $user->setUpdated(new \DateTime());

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();

        return array(
            'id' => $user->getId(),
            'created' => $user->getCreated(),
            'updated' => $user->getUpdated(),
            'email' => $user->getEmail()
        );
    }

    public function deleteUser($id) {
        /**
         * @var \App\Entity\User $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\User');
        $user = $repository->find($id);

        if ($user === null) {
            return false;
        }

        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush();

        return true;
    }

}
