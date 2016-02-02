<?php

namespace App\Resource;

use App\Resource;
use App\Service\FormaPgto as FormaPgtoService;

class FormaPgto extends Resource
{
    /**
     * @var \App\Service\FormaPgto
     */
    private $userService;

    /**
     * Get user service
     */
    public function init()
    {
        $this->setFormaPgtoService(new FormaPgtoService($this->getEntityManager()));
    }

    /**
     * @param null $id
     */
    public function get($id = null)
    {
        if ($id === null) {
            $data = $this->getFormaPgtoService()->getFormaPgtos();
        } else {
            $data = $this->getFormaPgtoService()->getFormaPgto($id);
        }
        if ($data === null) {
            self::response(self::STATUS_NOT_FOUND);
            return;
        }

        $response = array('formas' => $data);
        self::response(self::STATUS_OK, $response);
    }

    /**
     * Create user
     */
    public function post()
    {
        $email = $this->getSlim()->request()->params('email');
        $password = $this->getSlim()->request()->params('password');

        if (empty($email) || empty($password) || $email === null || $password === null) {
            self::response(self::STATUS_BAD_REQUEST);
            return;
        }

        $user = $this->getFormaPgtoService()->createFormaPgto($email, $password);

        self::response(self::STATUS_CREATED, array('user', $user));
    }

    /**
     * Update user
     */
    public function put($id)
    {
        $email = $this->getSlim()->request()->params('email');
        $password = $this->getSlim()->request()->params('password');

        if (empty($email) && empty($password) || $email === null && $password === null) {
            self::response(self::STATUS_BAD_REQUEST);
            return;
        }

        $user = $this->getFormaPgtoService()->updateFormaPgto($id, $email, $password);

        if ($user === null) {
            self::response(self::STATUS_NOT_IMPLEMENTED);
            return;
        }

        self::response(self::STATUS_NO_CONTENT);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $status = $this->getFormaPgtoService()->deleteFormaPgto($id);

        if ($status === false) {
            self::response(self::STATUS_NOT_FOUND);
            return;
        }

        self::response(self::STATUS_OK);
    }

    /**
     * Show options in header
     */
    public function options()
    {
        self::response(self::STATUS_OK, array(), array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'));
    }

    /**
     * @return \App\Service\FormaPgto
     */
    public function getFormaPgtoService()
    {
        return $this->userService;
    }

    /**
     * @param \App\Service\FormaPgto $userService
     */
    public function setFormaPgtoService($userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}