<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 22.06.2022
 * Time: 13:44
 */

namespace App\Modules\Pub\Home\Services;

use App\Modules\Pub\Home\Models\Email;
use App\Modules\Pub\Home\Models\User;
use App\Services\Services;

class HomeServices extends Services
{
    public   $email;

    public function __construct(User $user,Email $email)
    {
        $this->model = $user;
        $this->email = $email;
    }

    public function getUser() {
        return $this->model->UserBy();
    }

    public function saveEmail($data)
    {
        $this->email->fill($data);
        $this->email->save();
    }

    public function updateEmail($id,$data)
    {
        $email=$this->email->findOrFail($id);
        $email->update($data);
    }
}