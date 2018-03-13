<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OticasLojas extends Model
{
    public $timestamps = false;
    
    protected $table = 'oticas_lojas_gui';

    //seta quais os atributos do banco de dados eu posso atribuir em massa 'massAssigment'
    protected $fillable = [

            'idFiliado',
            'vcProjeto',
            'vcCredenciado',
            'vcNome',
            'vcEndereco',
            'vcBairro',
            'vcCidade',
            'vcEstado',
            'vcCep',
            'vcTelefone1',
            'vcTelefone2',
            'vcHorario',
            'vcLatitude',            
            'vcLongitude',
            'vcStatus',
            'vcPequenosOlhares'
    ];

    public function Salvar($linha){
        //dd($linha);
        //$enderecoComposto = str_replace(",", ", ", (str_replace(",,", ",", (str_replace(", ", ",", (str_replace(" ,", ",", "{$linha['dc_endereco']}, {$linha['dc_numero']}, {$linha['dc_complemento']}")))))));
        $telefone1 = strval($linha["vctelefone1"]);
        $telefone1 = str_replace(")", "", (str_replace("(", "", (str_replace("-", "", (preg_replace('/[^a-z0-9]/i', "", (strval($linha["vctelefone1"])))))))));
        $telefone2 = strval($linha["vctelefone2"]);
        $telefone2 = str_replace(")", "", (str_replace("(", "", (str_replace("-", "", (preg_replace('/[^a-z0-9]/i', "", (strval($linha["vctelefone2"])))))))));
        //$cep = strval($linha["dc_cep"]);

        if(!is_null($telefone1) && !empty($telefone1)){
            if(strlen($telefone1) == 10){
                $telefone1 = "(".substr($telefone1, 0, 2).") ".substr($telefone1, 2, 4)."-".substr($telefone1, 6, 4);
            }
            if(strlen($telefone1) == 11){
                $telefone1 = "(".substr($telefone1, 0, 2).") ".substr($telefone1, 2, 5)."-".substr($telefone1, 7, 4);
            }
        }

        if(!is_null($telefone2) && !empty($telefone2)){
            if(strlen($telefone2) == 10){
                $telefone2 = "(".substr($telefone2, 0, 2).") ".substr($telefone2, 2, 4)."-".substr($telefone2, 6, 4);
            }
            if(strlen($telefone2) == 11){
                $telefone2 = "(".substr($telefone2, 0, 2).") ".substr($telefone2, 2, 5)."-".substr($telefone2, 7, 4);
            }
        }
        $model = $this->create([
                'idFiliado' => intval($linha["idfiliado"]),
                'vcNome' => trim($linha["vcnome"]),
                'vcEndereco' => trim($linha["vcendereco"]),
                'vcBairro' => trim($linha["vcbairro"]),
                'vcCidade' => trim($linha["vccidade"]),
                'vcEstado' => strtoupper(trim($linha["vcuf"])),
                'vcCep' => trim($linha["vccep"]),
                'vcTelefone1' => trim($telefone1),
                'vcTelefone2' => trim($telefone2),
                'vcHorario' => trim($linha["vchorario"]),                
                'vcLatitude' => trim($linha["vclatitude"]),
                'vcLongitude' => trim($linha["vclongitude"]),
                'vcProjeto' => trim($linha["vcprojeto"]),
                'vcCredenciado' => trim($linha["vccredenciado"]),
                'vcPequenosOlhares' => ($linha["vcpequenosolhares"] == 1) ? true : false,
                'vcStatus' => ($linha["vcstatus"] == 1) ? true : false,
            ]);

        return $model;
    }
}
