<?php

/**
 * Class geradorDeObjetos
 *
 * @author Fabio Fila <contato@fabiofila.com.br
 */
class geradorDeObjetos
{

    /** @var string */
    private $dominio;    //Nome do dominio a qual pertente o objeto

    /** @var string */
    private $varObjeto;  //Nome do Objeto para variaveis

    /** @var string */
    private $objeto;     // Nome do objeto;

    /** @var string */
    private $table;

    /** @var array */
    private $tipos = [
        'Migration',
        'Model',
        'Repository',
        'Transform',
        'Controller',
        'Router',
        'Swagger'
    ];

    /**
     * geradorDeObjetos constructor.
     *
     * @param string $dominio
     * @param string $objeto
     */
    public function __construct($objeto, $table)
    {
        $this->objeto = ucfirst($objeto);
        $this->varObjeto = strtolower(substr($objeto, 0, 1)) . substr($objeto, 1);
        $this->table = $table;
    }

    /**
     * Cria um objeto vazio.
     *
     * @param string $dominio
     * @param string $pasta
     * @param string $objeto
     * @param string $tipo
     * @param string $codigo
     * @param bool $mostrarObjetos
     * @return string
     */
    public function fabricarObjetoVazio($tipo, $table, $codigo, $mostrarObjetos = false)
    {
        $objeto = $this->objeto;
        $pasta = __DIR__ . '/result_files/';

        switch (true) {
            case (strpos($tipo, 'Migration') !== false):
                $pasta .= 'database/migrations/';
                break;
            case (strpos($tipo, 'Controller') !== false):
                $pasta .= 'app/Http/Controllers/Admin/';
                $objeto .= 's';
                break;
            case (strpos($tipo, 'Model') !== false):
                $pasta .= 'app/Models/';
                $tipo = '';
                break;
            case (strpos($tipo, 'Repository') !== false):
                $pasta .= 'app/Repositories/';
                $objeto .= 's';
                break;
            case (strpos($tipo, 'Transform') !== false):
                $pasta .= 'app/Transformer/';
                $objeto .= 's';
                break;
        }

        $codigo = str_replace(
            ['DummyTable','Dummy', 'dummy'],
            [$table, $this->objeto, strtolower($this->objeto)],
            $codigo
        );

        $retorno = "<label>{$pasta}{$objeto}{$tipo}.php</label><br>\n";
        if ($mostrarObjetos) {
            $retorno .= "\n
        <textarea style=\"width: 100%;height: 200px;\">
        {$codigo}\n
        </textarea><br><br>\n";
        }
        if (!file_exists($pasta)) {
            mkdir($pasta, 0777, true);
        }
        $ext = '.php';
        if($tipo == 'Swagger'){
            $ext = '.json';
        }
        file_put_contents("{$pasta}{$objeto}{$tipo}{$ext}", $codigo);

        return $retorno;
    }

    /**
     * Retorna codigo de um tipo determinado. (tipo = Entity, Factory, Collection, Mapper etc);
     *
     * @param string $tipo
     * @return string
     */
    public function obterCodigoPorTipo($tipo)
    {
        $codigos = [];

        $codigos['Migration'] = file_get_contents('stubs/DummyMigration.php');
        $codigos['Controller'] = file_get_contents('stubs/DummyController.php');
        $codigos['Model'] = file_get_contents('stubs/DummyModel.php');
        $codigos['Repository'] = file_get_contents('stubs/DummyRepository.php');
        $codigos['Transform'] = file_get_contents('stubs/DummyTransform.php');
        $codigos['Router'] = file_get_contents('stubs/Router.php');
        $codigos['Swagger'] = file_get_contents('stubs/api.json');

        return $codigos[$tipo];
    }

    public function obterTipos()
    {
        return $this->tipos;
    }

    public function criarRouter($objeto)
    {

    }
}
