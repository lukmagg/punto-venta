<?php

    namespace App\Controllers;

    use App\Models\UnidadesModel;

    class Unidades extends BaseController{
        protected $unidades_Model;
        protected $reglas;

        public function __construct(){
            $this->unidades_Model = new UnidadesModel();
            helper(['form']); //Lo usaremos para las validaciones

            $this->reglas = [
                'nombre' => 
                [
                    'rules' => 'required',
                    'errors' => 
                    [
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
                'nombre_corto' => 
                [
                    'rules' => 'required',
                    'errors' => 
                    [
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ]
            ];

        }

        public function index($activo = 1){
            $unidades = $this->unidades_Model->where('activo', $activo)->findAll();
            $data = [
                'titulo' => 'Unidades',
                'datos' => $unidades
            ];

            echo view('header');
            echo view('unidades/unidades', $data);
            echo view('footer');
        }

        // Nuevo
        // Este metodo llamado desde el boton Agregar de la vista unidades
        public function nuevo(){
            $data = [
                'titulo' => 'Agregar unidad'
            ];
            echo view('header');
            echo view('unidades/nuevo', $data);
            echo view('footer');
        }

        // Insertar
        // Este metodo llamado desde el boton Guardar de la vista unidades
        public function insertar(){
            if($this->request->getMethod() == "post" && $this->validate($this->reglas)){
                $this->unidades_Model->save(['nombre' => $this->request->getPost('nombre'),'nombre_corto' => $this->request->getPost('nombre_corto')]);
                return redirect()->to(base_url().'/unidades');
            } else {
                $data = [
                    'titulo' => 'Agregar unidad',
                    'validation' => $this->validator
                ];
                echo view('header');
                echo view('unidades/nuevo', $data);
                echo view('footer');
            } 
        }

        // Editar
        // Este metodo es llamado desde el boton editar de la vista unidades. Y recibe el id como parametro.
        // El parametro valid es enviado desde el metodo actualizar si la validacion es falsa.
        // Si la validacion es verdadera no se envia el parameto valid y este toma el valor null.
        public function editar($id, $valid=null){
            $unidad = $this->unidades_Model->where('id', $id)->first();
            if($valid != null){
                $data = [
                    'titulo' => 'Editar unidad',
                    'datos' => $unidad,
                    'validation' => $valid
                ];
            } else {
                $data = [
                    'titulo' => 'Editar unidad',
                    'datos' => $unidad
                ];
            }
            
            echo view('header');
            echo view('unidades/editar', $data);
            echo view('footer');
        }

        // Actualizar
        // Este metodo es llamado desde el boton Guardar de la vista editar.
        public function actualizar(){
            if($this->request->getMethod() == "post" && $this->validate($this->reglas)){
                $this->unidades_Model->update($this->request->getPost('id'), ['nombre' => $this->request->getPost('nombre'),'nombre_corto' => $this->request->getPost('nombre_corto')]);
                return redirect()->to(base_url().'/unidades');
            }
            else {
                return $this->editar($this->request->getPost('id'), $this->validator);
            }
            
        }


        // Eliminar
        public function eliminar($id){
            $this->unidades_Model->update($id, ['activo' => 0]);
            return redirect()->to(base_url().'/unidades');
        }

        // Eliminados
        public function eliminados($activo = 0){
            $unidades = $this->unidades_Model->where('activo', $activo)->findAll();
            $data = [
                'titulo' => 'Unidades eliminadas',
                'datos' => $unidades
            ];

            echo view('header');
            echo view('unidades/eliminados', $data);
            echo view('footer');
        }

        // Reingresar
        public function reingresar($id){
            $this->unidades_Model->update($id, ['activo' => 1]);
            return redirect()->to(base_url().'/unidades');
        }
      


    }




?>