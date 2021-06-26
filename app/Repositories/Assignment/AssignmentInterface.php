<?php

namespace App\Repositories\Assignment;

interface AssignmentInterface
{
    public function getAllData();

    public function saveData(array $data);

}
