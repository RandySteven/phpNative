<?php

interface UserDAO{
    public function insertUser(User $user);
    public function searchUserById($id);
    public function getUser();
    public function destroyUser($id);
}