<?php

    namespace App\Controllers;

    use App\Models\ClientesModel;

    class Clientes extends BaseController{
  
        protected $clientes_Model;

        protected $reglas;

        public function __construct(){
            $this->clientes_Model = new ClientesModel();
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
                'direccion' => 
                [
                    'rules' => 'required',
                    'errors' => 
                    [
                        'required' => 'El campo {field} es obligatorio.',
                        'is_unique' => 'El campo {field} debe ser unico.'
                        
                    ]
                ],
                
            ];
        }

        public function index($activo = 1){
            $clientes = $this->clientes_Model->where('activo', $activo)->findAll();
            $data = [
                'titulo' => 'Clientes',
                'datos' => $clientes
            ];

            echo view('header');
            echo view('clientes/clientes', $data);
            echo view('footer');
        }

        // Nuevo
        
        public function nuevo(){

            $data = [
                'titulo' => 'Agregar cliente'
            ];
            echo view('header');
            echo view('clientes/nuevo', $data);
            echo view('footer');
        }

        // Insertar
        // Este metodo es llamado desde el boton Guardar de la vista nuevo
        public function insertar(){
            $nombre = $this->request->getPost('nombre');
            $direccion = $this->request->getPost('direccion');
            $telefono = $this->request->getPost('telefono');
            $correo = $this->request->getPost('correo');

            $cliente_nuevo = [
                'nombre' => $nombre,
                'direccion' => $direccion,
                'telefono' => $telefono,
                'correo' => $correo
            ];

            if($this->request->getMethod() == "post" && $this->validate($this->reglas)){
                $this->clientes_Model->save($cliente_nuevo);
                return redirect()->to(base_url().'/clientes');
            } else {
                $data = [
                    'titulo' => 'Agregar cliente',
                    'validation' => $this->validator
                ];
             
                echo view('header');
                echo view('clientes/nuevo', $data);
                echo view('footer');
            }
        }

        // Editar
        public function editar($id){
            $cliente = $this->clientes_Model->where('id', $id)->first();
            $data = [
                'titulo' => 'Editar cliente',
                'cliente' => $cliente
            ];
            echo view('header');
            echo view('clientes/editar', $data);
            echo view('footer');
        }

        public function actualizar(){
            $this->clientes_Model->update($this->request->getPost('id'), 
            [
                'nombre' => $this->request->getPost('nombre'),
                'direccion' => $this->request->getPost('direccion'),
                'telefono' => $this->request->getPost('telefono'),
                'correo' => $this->request->getPost('correo')
            ]);
            return redirect()->to(base_url().'/clientes');
        }

        // Eliminar
        // Este metodo es llamado desde el boton eliminar de la vista clientes.
        public function eliminar($id){
            $this->clientes_Model->update($id, ['activo' => 0]);
            return redirect()->to(base_url().'/clientes');
        }

        // Eliminados
        public function eliminados(){
            $clientes = $this->clientes_Model->where('activo', 0)->findAll();
            $data = [
                'titulo' => 'Clientes eliminadas',
                'datos' => $clientes
            ];

            echo view('header');
            echo view('clientes/eliminados', $data);
            echo view('footer');
        }

        // Reingresar
        public function reingresar($id){
            $this->clientes_Model->update($id, ['activo' => 1]);
            return redirect()->to(base_url().'/clientes');
        }
      


    }




?>