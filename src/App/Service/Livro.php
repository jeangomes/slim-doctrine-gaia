<?php

namespace App\Service;

use App\Service;
use App\Entity\Livro as LivroEntity;

class Livro extends Service {

    /**
     * @param $id
     * @return object
     */
    public function getLivro($id) {
        /**
         * @var \App\Entity\Livro $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\Livro');
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
    public function getLivros() {
        $repository = $this->getEntityManager()->getRepository('App\Entity\Livro');
        $users = $repository->findAll();

        if (empty($users)) {
            return null;
        }

        /**
         * @var \App\Entity\Livro $user
         */
        $data = array();
        foreach ($users as $user) {           
            $data[] = array(
                'id' => $user->getId(),
                'titulo' => $user->getTitulo(),
                //'data_cadastro' => $user->getCreated(),
                //'updated' => $user->getUpdated(),
                'ndepagina' => $user->getNdepagina(),
                'autor' => $user->getAutor()->getNome(),
            );
        }

        return $data;
    }

    /**
     * @param $email
     * @param $password
     * @return array
     */
    public function createLivro($nome, $nacionalidade, $sexo) {
        $user = new LivroEntity();
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
    public function updateLivro($id, $nome, $nacionalidade, $sexo) {
        /**
         * @var \App\Entity\Livro $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\Livro');
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

    public function deleteLivro($id) {
        /**
         * @var \App\Entity\Livro $user
         */
        $repository = $this->getEntityManager()->getRepository('App\Entity\Livro');
        $user = $repository->find($id);

        if ($user === null) {
            return false;
        }

        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush();

        return true;
    }

}
