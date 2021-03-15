<?php

namespace App\Contracts;

interface Importable {
    
    /**
     * Imports a csv file into a database table
     * 
     * @return Response
     */
    public function import ();

}