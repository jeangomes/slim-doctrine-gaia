<?php

namespace App\Service;

use App\Service;
use App\Entity\Autor as AutorEntity;

class Autor extends Service {

    /**
     * @param $id
     * @return object
     */
    public function getAutor($id) {
        /**
         * @var \App\Entity\Autor $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\Autor');
        $user = $repository->find($id);

        if ($user === null) {
            return null;
        }

        return array(
            'id' => $user->getId(),
            //'created' => $user->getCreated(),
            //'updated' => $user->getUpdated(),
            'sexo' => $user->getSexo(),
            'nome' => $user->getNome(),
            'nacionalidade' => $user->getNacionalidade()
        );
    }

    /**
     * @return array|null
     */
    public function getAutors() {
        $repository = $this->getEntityManager()->getRepository('App\Entity\Autor');
        $users = $repository->findAll();

        if (empty($users)) {
            return null;
        }

        /**
         * @var \App\Entity\Autor $user
         */
        $data = array();
        foreach ($users as $user) {
            $data[] = array(
                'id' => $user->getId(),
                'sexo' => $user->getSexo(),
                'nome' => $user->getNome(),
                //'data_cadastro' => $user->getCreated(),
                //'updated' => $user->getUpdated(),
                'nacionalidade' => $user->getNacionalidade(),
            );
        }

        return $data;
    }

    /**
     * @param $email
     * @param $password
     * @return array
     */
    public function createAutor($nome, $nacionalidade, $sexo) {
        $user = new AutorEntity();
        $user->setNome($nome);
        $user->setNacionalidade($nacionalidade);
        $user->setSexo($sexo);

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();

        return array(
            'id' => $user->getId(),
            //'created' => $user->getCreated(),
            //'updated' => $user->getUpdated(),
            'nome' => $user->getNome()
        );
    }

    /**
     * @param $id
     * @param $email
     * @param $password
     * @return array|null
     */
    public function updateAutor($id, $nome, $nacionalidade, $sexo) {
        /**
         * @var \App\Entity\Autor $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\Autor');
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

    public function deleteAutor($id) {
        /**
         * @var \App\Entity\Autor $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\Autor');
        $user = $repository->find($id);

        if ($user === null) {
            return false;
        }

        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush();

        return true;
    }

}
