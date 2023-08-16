<?php

    class SignupController extends Signup {
        protected $un;
        protected $pwd;
        protected $pwdRepeat;

        public function __construct($un, $pwd, $pwdRepeat) {
            $this->un = $un;
            $this->pwd = $pwd;
            $this->pwdRepeat = $pwdRepeat;
        }

        public function signupUser() {
            if ($this->emptyInput() == false)  {
                echo "Empty input!";
                header("location: ../signup.php?error=emptyinput");
                exit();
            }

            if ($this->pwdMatch() == false)  {
                echo "Passwords don`t match!";
                header("location: ../index.php?error=passwordsmatch");
                exit();
            }

            if ($this->uidTakenCheck() == false)  {
                echo "Username or email taken!";
                header("location: ../index.php?error=useroremailtaken");
                exit();
            }

            $this->setUser($this->un, $this->pwd);
        }

        private function emptyInput() {
            $result;
            if (empty($this->un) || empty($this->pwd) || empty($this->pwdRepeat)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }

        private function pwdMatch() {
            $result;
            if ($this->pwd !== $this->pwdRepeat) {
                $result = false;
            } else {
                $result = true;
            }
            return $result;
        }

        private function uidTakenCheck() {
            $result;
            if (!$this->checkUser($this->un)) {
                $result = false;
            } else {
                $result = true;
            }
            return $result;
        }
    }