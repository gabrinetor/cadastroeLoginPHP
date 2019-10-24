<?php    

    class Conexao {
        //classe para estabelecer conexão ao database para inserir valores no arquivo

        private $data = array();    //Atributo privado Array
        protected $pdo = null;      //Encapsulamento de objeto PDO inicializado
         
        // Passar valor para o array privado $data
        public function __set($name, $value){
            $this->data[$name] = $value;    //o valor é igual à lista array de nomes
        }
 
        // Retornar o valor do índice da Array
        public function __get($name){
            if (array_key_exists($name, $this->data)) {
                return $this->data[$name];
            }
 
            //se não retorna erro aplicando gatilho apontando erro
            $trace = debug_backtrace();
            trigger_error(
                'Undefined property via __get(): ' . $name .
                ' in ' . $trace[0]['file'] .
                ' on line ' . $trace[0]['line'],
                E_USER_NOTICE);
            return null;
        }
         
        // Retornar o atributo protegido (encapsulamento)
        public function getPdo() {
            return $this->pdo;
        }
 
        // Construtor criado para forçar conexão com PDO (extensão do php que trata dados como objetos -orm) 
        function __construct($pdo = null) {
            $this->pdo = $pdo;
            if ($this->pdo == null)
                $this->conectar();
        }
 
        // Forçar validação para criar objeto para forçar conexão senao retorna erro
        public function conectar() {
            try {
                $this->pdo = new PDO("mysql:host=localhost;dbname=cadastrocliente",
                                "root",
                                "",
                                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
 
        //finalizar conexão com pdo
        public function desconectar() {
            $this->pdo = null;
        }
 
        //preparando pdo para buscar por registros do objeto sql
        public function select($sql){
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>