<?php

class Bd {
    public function __construct(
        private $host,
        private $database,
        private $user,
        private $password
    ) {}

    public function connect() {

    }
}