<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OticasLojasNovo extends Model
{
    public $timestamps = false;
    
    protected $table = 'lojas';

    //seta quais os atributos do banco de dados eu posso atribuir em massa 'massAssigment'
    protected $fillable = [

            'idFiliado',
            'nome',
            'projeto',
            'credenciado',
            'endereco',
            'bairro',
            'cidade',
            'estado',
            'cep',
            'telefonePrincipal',
            'telefoneAlternativo',
            'horario',
            'latitude',            
            'longitude',
            'actived',
            'pequenosOlhares',
            'userIdCreated',
            'userIdUpdated'
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

        // if(!is_null($cep) && !empty($cep)){
        //     if(strlen($cep) == 8){
        //         $cep = substr($cep, 0, 5)."-".substr($cep, 5);
        //     }
        // }
        
        // if(substr($enderecoComposto, -2) == ", ")
        //     $enderecoComposto = trim(substr($enderecoComposto, 0, (strlen($enderecoComposto)-2)));
        //dd($enderecoComposto);

        $model = $this->create([
                'idFiliado' => intval($linha["idfiliado"]),
                'nome' => trim($linha["vcnome"]),
                'projeto' => trim($linha["vcprojeto"]),
                'credenciado' => trim($linha["vccredenciado"]),
                'endereco' => trim($linha["vcendereco"]),
                'bairro' => trim($linha["vcbairro"]),
                'cidade' => trim($linha["vccidade"]),
                'estado' => strtoupper(trim($linha["vcuf"])),
                'cep' => trim($linha["vccep"]),
                'telefonePrincipal' => trim($telefone1),
                'telefoneAlternativo' => trim($telefone2),
                'horario' => trim($linha["vchorario"]),                
                'latitude' => trim($linha["vclatitude"]),
                'longitude' => trim($linha["vclongitude"]),
                'pequenosOlhares' => ($linha["vcpequenosolhares"] == 1) ? true : false,
                'actived' => ($linha["vcstatus"] == 1) ? true : false,
                'userIdCreated' => 1,
                'userIdUpdated' => 1
            ]);

        return $model;
    }
}
