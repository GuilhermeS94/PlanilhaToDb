<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FbInsightsNaoIncluso extends Model
{
    // const CREATED_AT = 'created';
	// const UPDATED_AT = 'updated';
    public $timestamps = false;
    
    protected $table = 'FbInsightsNaoIncluso';

    //seta quais os atributos do banco de dados eu posso atribuir em massa 'massAssigment'
    protected $fillable = [

            'CampaignName',
            'Clicks',
            'Ctr',
            'Frequency',
            'Impressions',
            'Reach',
            'VideoViews',
            'PostEngagement',
            'Spend',
            'StartDate',
            'EndDate',
            'FbConfigId'
    ];

    public function Salvar($linha){

        $model = $this->create([
                'CampaignName' => $linha["dsc_nom_campanha"],
                'Clicks' => intval($linha["qtd_clique"]),
                'Ctr' => floatval($linha["vlr_ctr"]),
                'Frequency' => floatval($linha["vlr_frequencia"])/1000000,
                'Impressions' => intval($linha["qtd_impressoes"]),
                'Reach' => intval($linha["qtd_alcance"]),
                'VideoViews' => intval($linha["qtd_views_video"]),
                'PostEngagement' => intval($linha["qtd_env_publi"]),
                'Spend' => floatval($linha["vlr_gasto_brl"]),
                'StartDate' => $linha["dat_camp_diario"],
                'EndDate' => $linha["dat_camp_diario"],
                //'FbConfigId' => $linha[""]
            ]);

        return $model;
    }

    public function Salvar2($linha){
        //dd($linha);
        $configId = NULL;
        if($linha["dsc_marca"] == "Tylenol")$configId = 10;
        else if($linha["dsc_marca"] == "Carefree")$configId = 1;
        else if($linha["dsc_marca"] == "Nicorette")$configId = 12;

        $model = $this->create([
                'CampaignName' => $linha["nome_campanha"],
                'Clicks' => intval($linha["qtd_clique"]),
                'Ctr' => floatval($linha["vlr_ctr"]),
                'Frequency' => floatval($linha["vlr_frequencia"]),
                'Impressions' => intval($linha["qtd_impressoes"]),
                'Reach' => intval($linha["qtd_alcance"]),
                'VideoViews' => intval($linha["qtd_views_video"]),
                'PostEngagement' => intval($linha["qtd_env_publi"]),
                'Spend' => floatval($linha["vlr_gasto_brl"]),
                'StartDate' => $linha["dia"],
                'EndDate' => $linha["dia"],
                'FbConfigId' => $configId
            ]);

        return $model;
    }
}
