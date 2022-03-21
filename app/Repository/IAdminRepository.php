<?php

namespace App\Repository;

interface IAdminRepository{

    public function getAllAdmins();
    public function addNewAdmins();
    public function storeNewAdmins(array $admindata);
    public function showAdmin($id);
    public function updateAdmin($id,array $admindata);
    public function deleteAdmin($id);
    public function changeStatus($id);
    public function saveNewPassword();
}


?>