<?php

namespace App\Service;

use App\Service;
use App\Entity\CompraFormaPgto as FormaPgtoEntity;

class FormaPgto extends Service {

    /**
     * @param $id
     * @return object
     */
    public function getFormaPgto($id) {
        /**
         * @var \App\Entity\FormaPgto $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\FormaPgto');
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
    public function getFormaPgtos() {
        $repository = $this->getEntityManager()->getRepository('App\Entity\FormaPgto');
        $users = $repository->findAll();

        if (empty($users)) {
            return null;
        }

        /**
         * @var \App\Entity\FormaPgto $user
         */
        $data = array();
        foreach ($users as $user) {
            $data[] = array(
                'id_forma' => $user->getId(),
                'descricao' => $user->getDescricao(),
            );
        }

        return $data;
    }

    /**
     * @param $email
     * @param $password
     * @return array
     */
    public function createFormaPgto($email, $password) {
        $user = new FormaPgtoEntity();
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
    public function updateFormaPgto($id, $email, $password) {
        /**
         * @var \App\Entity\FormaPgto $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\FormaPgto');
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

    public function deleteFormaPgto($id) {
        /**
         * @var \App\Entity\FormaPgto $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\FormaPgto');
        $user = $repository->find($id);

        if ($user === null) {
            return false;
        }

        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush();

        return true;
    }

}
