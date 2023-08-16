<?php

    class LoginController extends Login {

        protected $un;
        protected $psd;

        public function __construct($uid, $psd) {
            $this->un = $uid;
            $this->psd = $psd;
        }

        public function loginUser() {
            self::getUser($this->un, $this->psd);
        }
    }