<?php

    namespace App\Controllers;

    use App\Models\ConfiguracionModel;

    class Configuracion extends BaseController{
        protected $configuracion_Model;
        protected $reglas;

        public function __construct(){
            $this->configuracion_Model = new ConfiguracionModel();
            helper(['form']); //Lo usaremos para las validaciones

            $this->reglas = [
                'tienda_nombre' => 
                [
                    'rules' => 'required',
                    'errors' => 
                    [
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ],
                'tienda_rfc ' => 
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
            $nombre = $this->configuracion_Model->where('nombre', 'tienda_nombre')->first();
            $rfc = $this->configuracion_Model->where('nombre', 'tienda_rfc')->first();
            $telefono = $this->configuracion_Model->where('nombre', 'tienda_telefono')->first();
            $email = $this->configuracion_Model->where('nombre', 'tienda_email')->first();
            $direccion = $this->configuracion_Model->where('nombre', 'tienda_direccion')->first();
            $leyenda = $this->configuracion_Model->where('nombre', 'ticket_leyenda')->first();
            
            $data = [
                'titulo' => 'Configuracion',
                'nombre' => $nombre,
                'rfc' => $rfc,
                'telefono' => $telefono,
                'email' => $email,
                'direccion' => $direccion,
                'leyenda' => $leyenda
            ];

            echo view('header');
            echo view('configuracion/configuracion', $data);
            echo view('footer');
        }


        // Actualizar
        // Este metodo es llamado desde el boton Guardar de la vista editar.
        public function actualizar(){
            if($this->request->getMethod() == "post" && $this->validate($this->reglas)){

        

                $this->configuracion_Model->whereIn('nombre', ['tienda_nombre'])->set(['valor' => 
                $this->request->getPost('tienda_nombre')])->update();
                $this->configuracion_Model->whereIn('nombre', ['tienda_rfc'])->set(['valor' => 
                $this->request->getPost('tienda_rfc')])->update();
                $this->configuracion_Model->whereIn('nombre', ['tienda_telefono'])->set(['valor' => 
                $this->request->getPost('tienda_telefono')])->update();
                $this->configuracion_Model->whereIn('nombre', ['tienda_email'])->set(['valor' => 
                $this->request->getPost('tienda_email')])->update();
                $this->configuracion_Model->whereIn('nombre', ['tienda_direccion'])->set(['valor' => 
                $this->request->getPost('tienda_direccion')])->update();
                $this->configuracion_Model->whereIn('nombre', ['ticket_leyenda'])->set(['valor' => 
                $this->request->getPost('ticket_leyenda')])->update();


                
                return redirect()->to(base_url().'/configuracion');
            }
            else {
                //return $this->editar($this->request->getPost('id'), $this->validator);
            }
            
        }




    }




?>