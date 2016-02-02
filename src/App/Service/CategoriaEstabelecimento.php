<?php

namespace App\Service;

use App\Service;
use App\Entity\CategoriaEstabelecimento as UserEntity;

class CategoriaEstabelecimento extends Service {

    /**
     * @param $id
     * @return object
     */
    public function getUser($id) {
        /**
         * @var \App\Entity\User $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\CategoriaEstabelecimento');
        $user = $repository->find($id);

        if ($user === null) {
            return null;
        }

        return array(
            'id' => $user->getId(),
            'created' => $user->getCreated(),
            'updated' => $user->getUpdated(),
            'email' => $user->getEmail()
        );
    }

    /**
     * @return array|null
     */
    public function getUsers() {
        $repository = $this->getEntityManager()->getRepository('App\Entity\CategoriaEstabelecimento');
        $users = $repository->findAll();

        if (empty($users)) {
            return null;
        }

        /**
         * @var \App\Entity\User $user
         */
        $data = array();
        foreach ($users as $user) {
            $data[] = array(
                'id_cat' => $user->getId(),
                'cat' => $user->getNome(),
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
