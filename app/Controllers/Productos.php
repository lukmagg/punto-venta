<?php

    namespace App\Controllers;

    use App\Models\ProductosModel;
    use App\Models\UnidadesModel;
    use App\Models\CategoriasModel;

    class Productos extends BaseController{
  
        protected $productos_Model;

        protected $reglas;

        public function __construct(){
            $this->productos_Model = new ProductosModel();
            $this->unidades_Model = new UnidadesModel();
            $this->categorias_Model = new CategoriasModel();
            helper(['form']); //Lo usaremos para las validaciones

            $this->reglas = [
                'codigo' => 
                [
                    'rules' => 'required|is_unique[productos.codigo]',
                    'errors' => 
                    [
                        'required' => 'El campo {field} es obligatorio.',
                        'is_unique' => 'El campo {field} debe ser unico.'
                        
                    ]
                ],
                'nombre' => 
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
            $productos = $this->productos_Model->where('activo', $activo)->findAll();
            $data = [
                'titulo' => 'Productos',
                'datos' => $productos
            ];

            echo view('header');
            echo view('productos/productos', $data);
            echo view('footer');
        }

        // Nuevo
        
        public function nuevo(){
            $unidades = $this->unidades_Model->where('activo', 1)->findAll();
            $categorias = $this->categorias_Model->where('activo', 1)->findAll();

            $data = [
                'titulo' => 'Agregar producto',
                'unidades' => $unidades,
                'categorias' => $categorias
            ];
            echo view('header');
            echo view('productos/nuevo', $data);
            echo view('footer');
        }

        // Insertar
        // Este metodo es llamado desde el boton Guardar de la vista nuevo
        public function insertar(){

            $codigo = $this->request->getPost('codigo');
            $nombre = $this->request->getPost('nombre');
            $precio_venta = $this->request->getPost('precio_venta');
            $precio_compra = $this->request->getPost('precio_compra');
            $id_unidad = $this->request->getPost('id_unidad');
            $id_categoria = $this->request->getPost('id_categoria');
            $stock_minimo = $this->request->getPost('stock_minimo');
            $inventariable = $this->request->getPost('inventariable');

            $producto_nuevo = [
                'codigo' => $codigo,
                'nombre' => $nombre,
                'precio_venta' => $precio_venta,
                'precio_compra' => $precio_compra,
                'id_unidad' => $id_unidad,
                'id_categoria' => $id_categoria,
                'stock_minimo' => $stock_minimo,
                'inventariable' => $inventariable,
            ];

            if($this->request->getMethod() == "post" && $this->validate($this->reglas)){
                $this->productos_Model->save($producto_nuevo);
                return redirect()->to(base_url().'/productos');
            } else {
                $unidades = $this->unidades_Model->where('activo', 1)->findAll();
                $categorias = $this->categorias_Model->where('activo', 1)->findAll();

                $data = [
                    'titulo' => 'Agregar producto',
                    'unidades' => $unidades,
                    'categorias' => $categorias,
                    'validation' => $this->validator
                ];
            
                echo view('header');
                echo view('productos/nuevo', $data);
                echo view('footer');
            }
        }

        // Editar
        public function editar($id){
            $unidades = $this->unidades_Model->where('activo', 1)->findAll();
            $categorias = $this->categorias_Model->where('activo', 1)->findAll();
            $producto = $this->productos_Model->where('id', $id)->first();
            $data = [
                'titulo' => 'Editar producto',
                'unidades' => $unidades,
                'categorias' => $categorias,
                'producto' => $producto
            ];
            echo view('header');
            echo view('productos/editar', $data);
            echo view('footer');
        }

        public function actualizar(){
            $this->productos_Model->update($this->request->getPost('id'), 
            [
                'codigo' => $this->request->getPost('codigo'),
                'nombre' => $this->request->getPost('nombre'),
                'precio_venta' => $this->request->getPost('precio_venta'),
                'precio_compra' => $this->request->getPost('precio_compra'),
                'stock_minimo' => $this->request->getPost('stock_minimo'),
                'inventariable' => $this->request->getPost('inventariable'),
                'id_unidad' => $this->request->getPost('id_unidad'),
                'id_categoria' => $this->request->getPost('id_categoria'),
            ]);

            return redirect()->to(base_url().'/productos');
        }

        // Eliminar
        public function eliminar($id){
            $this->productos_Model->update($id, ['activo' => 0]);
            return redirect()->to(base_url().'/productos');
        }

        // Eliminados
        public function eliminados(){
            $productos = $this->productos_Model->where('activo', 0)->findAll();
            $data = [
                'titulo' => 'Productos eliminadas',
                'datos' => $productos
            ];

            echo view('header');
            echo view('productos/eliminados', $data);
            echo view('footer');
        }

        // Reingresar
        public function reingresar($id){
            $this->productos_Model->update($id, ['activo' => 1]);
            return redirect()->to(base_url().'/productos');
        }
      


    }




?>