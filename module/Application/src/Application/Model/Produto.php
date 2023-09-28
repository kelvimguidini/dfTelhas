<?php 

namespace Application\Model;



use Doctrine\ORM\Mapping as ORM;



/**

 * @ORM\Entity

 */

class Produto

{

    

    /**

     * @ORM\Id

     * @ORM\GeneratedValue("AUTO")

     * @ORM\Column(type="integer")

     */

    public $id;

    

    /**

     * @ORM\Column(type="string", length=25)

     */

    public $modelo;

    

    /**

     * @ORM\Column(type="datetime")

     */

    public $data;

    

    /**

     * @ORM\Column(type="integer")

     */

    public $id_venda;

    

    /**

     * @ORM\Column(type="string", length=20)

     */

    public $cor;

    

    /**

     * @ORM\Column(type="integer")

     */

    public $quantidade;

    

    /**

     * @ORM\Column(type="decimal")

     */

    public $valor;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Model\Venda", inversedBy="id_venda")
     * @ORM\JoinColumn(name="id_venda")
     */
    public $venda;


    /**
     * @ORM\Column(type="decimal")
     */
    public $custo;


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getVenda() {
        return $this->venda;
    }

    public function setVenda($venda) {
        $this->venda = $venda;
    }

    public function getData() {
        return ($this->data != null)?$this->data->format('d/m/Y'):null;
    }

    public function setData($data) {
        if($data != null){
            $ano= substr($data, 6);
            $mes= substr($data, 3,-5);
            $dia= substr($data, 0,-8);
            $data = $ano."-".$mes."-".$dia;
            $this->data =  new \DateTime($data);
        }
    }

    public function getModelo() {

        return $this->modelo;

    }

    

    public function setModelo($modelo) {

        $this->modelo = $modelo;

    }

    

    public function getCor() {

        return $this->cor;

    }

    

    public function setCor($cor) {

        $this->cor = $cor;

    }

    

    public function getQuantidade() {

        return $this->quantidade;

    }

    

    public function setQuantidade($quantidade) {

        $this->quantidade = $quantidade;

    }

    

    public function getValor() {
        $source = array('.');
        $replace = array(',');
        return str_replace($source, $replace, $this->valor);
    }

    public function setValor($valor) {
        $source = array('.', ',');
        $replace = array('', '.');
//         \Zend\Debug\Debug::dump(str_replace($source, $replace, $valor));
        $this->valor = str_replace($source, $replace, $valor);
    }    

    public function getCusto() {
        $source = array('.');
        $replace = array(',');
        return str_replace($source, $replace, $this->custo);
    }

    public function setCusto($valor) {
        $source = array('.', ',');
        $replace = array('', '.');
        $this->custo = str_replace($source, $replace, $valor);
    }
}