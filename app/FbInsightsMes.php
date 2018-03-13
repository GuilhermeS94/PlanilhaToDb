<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FbInsightsMes extends Model
{
    // const CREATED_AT = 'created';
	// const UPDATED_AT = 'updated';
    public $timestamps = false;
    
    protected $table = 'FbInsightsMes';

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
            'StartCampaign',
            'StopCampaign',
            'FbConfigId'
    ];

    public function Salvar($linha){
        //dd($linha);
        $configId = 7;

        $model = $this->create([
                'CampaignName' => $linha["campaign_name"],
                'Clicks' => intval($linha["clicks_all"]),
                'Ctr' => floatval($linha["ctr_all"]),
                'Frequency' => floatval($linha["frequency"]),
                'Impressions' => intval($linha["impressions"]),
                'Reach' => intval($linha["reach"]),
                'VideoViews' => intval($linha["3_second_video_views"]),
                'PostEngagement' => intval($linha["post_engagement"]),
                'Spend' => floatval($linha["amount_spent_brl"]),
                'StartDate' => $linha["reporting_starts"],
                'EndDate' => $linha["reporting_ends"],
                'StartCampaign' => $linha["starts"],
                'StopCampaign' => ($linha["ends"] == "Contínuo") ? date("Y-m-d H:i:s") : $linha["ends"],
                'FbConfigId' => $configId
            ]);

        return $model;
    }
}
