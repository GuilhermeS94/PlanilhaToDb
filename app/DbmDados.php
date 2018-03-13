<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DbmDados extends Model
{

    public $timestamps = false;
    
    protected $table = 'DbmDadosTemp';

    //seta quais os atributos do banco de dados eu posso atribuir em massa 'massAssigment'
    protected $fillable = [

            'Advertiser',
            'AdvertiserId',
            'AdvertiserStatus',
            'AdvertiserIntegrationCode',
            'InsertionOrder',
            'InsertionOrderId',
            'InsertionOrderStatus',
            'InsertionOrderIntegrationCode',
            'LineItem',
            'LineItemId',
            'LineItemStatus',
            'LineItemIntegrationCode',
            'TargetedDataProviders',
            'AdvertiserCurrency',
            'Impressions',
            'MeasurableImpressions',
            'ViewableImpressions',
            'PercentViewableImpressions',
            'Clicks',
            'Revenue',
            'MidiaCost',
            'TotalMediaCost',
            'StartsVideo',
            'CompleteViewsVideo',
            'CompanionImpressionsVideo',
            'Dia'
    ];

    public function Salvar($linha){

        $model = $this->create([
                'Advertiser' => $linha["anunciante"],
                'AdvertiserId' => $linha["codigo_do_anunciante"],
                'AdvertiserStatus' => $linha["status_do_anunciante"],
                'AdvertiserIntegrationCode' => $linha["codigo_de_integracao_de_anunciante"],
                'InsertionOrder' => $linha["pedido_de_insercao"],
                'InsertionOrderId' => $linha["codigo_do_pedido_de_insercao"],
                'InsertionOrderStatus' => $linha["status_do_pedido_de_insercao"],
                'InsertionOrderIntegrationCode' => $linha["codigo_de_integracao_do_pedido_de_insercao"],
                'LineItem' => $linha["item_de_linha"],
                'LineItemId' => $linha["codigo_do_item_de_linha"],
                'LineItemStatus' => $linha["status_do_item_de_linha"],
                'LineItemIntegrationCode' => $linha["codigo_de_integracao_do_item_de_linha"],
                'TargetedDataProviders' => $linha["provedores_de_dados_segmentados"],
                'AdvertiserCurrency' => $linha["moeda_do_anunciante"],
                'Impressions' => $linha["impressoes"],
                'MeasurableImpressions' => $linha["active_view_impressoes_mensuraveis"],
                'ViewableImpressions' => $linha["active_view_impressoes_visiveis"],
                'PercentViewableImpressions' => $linha["active_view_porcentagem_de_impressoes_visiveis"],
                'Clicks' => $linha["cliques"],
                'Revenue' => $linha["receita_moeda_do_anunciante"],
                'MidiaCost' => $linha["custo_de_midia_moeda_do_anunciante"],
                'TotalMediaCost' => $linha["custo_de_midia_total_moeda_do_anunciante"],
                'StartsVideo' => $linha["inicios_video"],
                'CompleteViewsVideo' => $linha["visualizacoes_completas_video"],
                'CompanionImpressionsVideo' => $linha["impressoes_complementares_video"],
                'Dia' => $linha["data"]
            ]);

        return $model;
    }
}
