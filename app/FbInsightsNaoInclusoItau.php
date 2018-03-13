<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FbInsightsNaoInclusoItau extends Model
{
    // const CREATED_AT = 'created';
	// const UPDATED_AT = 'updated';
    public $timestamps = false;
    
    protected $table = 'fbinsights';

    //seta quais os atributos do banco de dados eu posso atribuir em massa 'massAssigment'
    protected $fillable = [

            'CampaignName',
            'Impressions',
            'Reach',
            'SocialReach',
            'Frequency',
            'Clicks',
            'InlineLinkClicks',
            'CallToActionClicks',
            'Ctr',
            'Cpc',
            'Cpm',
            'CostPerInlinePostEngagement',
            'InlinePostEngagement',
            'Spend',
            'CanvasAvgViewTime',
            'PercentVideoViews25',
            'PercentVideoViews50',
            'PercentVideoViews75',
            'PercentVideoViews95',
            'PercentVideoViews100',
            'CostPerViews10s',
            'StartDate',
            'EndDate',
            'FBConfigId'
    ];

    public function Salvar($linha){
        //dd($linha);
        $model = $this->create([
                'FBConfigId' => 7,
                'CampaignName' => $linha["nome_da_campanha"],
                'Impressions' => intval($linha["impressoes"]),
                'Reach' => intval($linha["alcance"]),
                //'SocialReach' => intval($linha["qtd_views_video"]),
                //'Frequency' => intval($linha["qtd_env_publi"]),
                //'Clicks' => intval($linha["qtd_clique"]),
                'InlineLinkClicks' => (!is_null($linha["cliques_no_link"]))?(intval($linha["cliques_no_link"])):0,
                //'CallToActionClicks' => $linha["dsc_nom_campanha"],
                'Ctr' => intval($linha["ctr_todos"]),
                'Cpc' => floatval($linha["cpc_todos_brl"]),
                //'Cpm' => floatval($linha["vlr_frequencia"])/1000000,
                //'CostPerInlinePostEngagement' => intval($linha["qtd_impressoes"]),
                'InlinePostEngagement' => (!is_null($linha["envolvimento_com_a_pagina"]))?(intval($linha["envolvimento_com_a_pagina"])):0,
                'Spend' => floatval($linha["valor_gasto_brl"]),
                //'PostEngagement' => intval($linha["qtd_env_publi"]),
                //'CanvasAvgViewTime' => floatval($linha["vlr_gasto_brl"]),
                //'PercentVideoViews25' => $linha["dat_camp_diario"],
                //'PercentVideoViews50' => $linha["dsc_nom_campanha"],
                //'PercentVideoViews75' => intval($linha["qtd_clique"]),
                //'PercentVideoViews95' => floatval($linha["vlr_ctr"]),                
                //'PercentVideoViews100' => floatval($linha["vlr_ctr"]),                
                //'CostPerViews10s' => floatval($linha["vlr_ctr"]),  
                'StartDate' => $linha["inicio_dos_relatorios"],
                'EndDate' => $linha["termino_dos_relatorios"]
            ]);

        return $model;
    }
}
