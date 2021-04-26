<?php

    namespace App\Controllers;

    use App\Models\CategoriasModel;

    class Categorias extends BaseController{
        protected $categorias_Model;

        public function __construct(){
            $this->categorias_Model = new CategoriasModel();
        }



        public function index($activo = 1){
            $categorias = $this->categorias_Model->where('activo', $activo)->findAll();
            $data = [
                'titulo' => 'Categorias',
                'datos' => $categorias
            ];

            echo view('header');
            echo view('categorias/categorias', $data);
            echo view('footer');
        }

        // Nuevo
        public function nuevo(){
            $data = [
                'titulo' => 'Agregar categoria'
            ];
            echo view('header');
            echo view('categorias/nuevo', $data);
            echo view('footer');
        }

        // Insertar
        public function insertar(){
            $this->categorias_Model->save(['nombre' => $this->request->getPost('nombre')]);
            return redirect()->to(base_url().'/categorias');
        }

        // Editar
        public function editar($id){
            $categoria = $this->categorias_Model->where('id', $id)->first();
            $data = [
                'titulo' => 'Editar categoria',
                'datos' => $categoria
            ];
            echo view('header');
            echo view('categorias/editar', $data);
            echo view('footer');
        }

        public function actualizar(){
            $this->categorias_Model->update($this->request->getPost('id'), ['nombre' => $this->request->getPost('nombre')]);
            return redirect()->to(base_url().'/categorias');
        }


        // Eliminar
        public function eliminar($id){
            $this->categorias_Model->update($id, ['activo' => 0]);
            return redirect()->to(base_url().'/categorias');
        }

        // Eliminados
        public function eliminados($activo = 0){
            $categorias = $this->categorias_Model->where('activo', $activo)->findAll();
            $data = [
                'titulo' => 'Categorias eliminadas',
                'datos' => $categorias
            ];

            echo view('header');
            echo view('categorias/eliminados', $data);
            echo view('footer');
        }

        // Reingresar
        public function reingresar($id){
            $this->categorias_Model->update($id, ['activo' => 1]);
            return redirect()->to(base_url().'/categorias');
        }
      


    }




?>