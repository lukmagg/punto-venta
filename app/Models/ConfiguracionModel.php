<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class ConfiguracionModel extends Model{
        protected $table      = 'configuracion';
        protected $primaryKey = 'id';

        protected $useAutoIncrement = true;

        protected $returnType     = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = ['nombre','valor'];

        protected $useTimestamps = true;

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
    }




?>