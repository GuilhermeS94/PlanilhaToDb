<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YoutubeVideoDados extends Model
{
    public $timestamps = false;
    
    protected $table = 'YtVideoDados';

    //seta quais os atributos do banco de dados eu posso atribuir em massa 'massAssigment'
    protected $fillable = [

        'YtConfigId',
        'StrId',
        'AnnotationClicks',
        'CardClicks',
        'CardTeaserClicks',
        'EstimatedMinutesWatched',
        'Views',
        'AverageViewDuration',
        'AverageViewPercentage',
        'Likes',
        'Dislikes',
        'Shares',
        'Comments',
        'VideosAddedToPlaylists',
        'VideosRemovedFromPlaylists',
        'SubscribersGained',
        'SubscribersLost',
        'Published',
        'StartDate',
        'EndDate',
        'Created',
        'Updated',
        'Actived',
        'UserCreated',
        'UserUpdated'
    ];

    public function Salvar($linha){
        //dd($linha);
        
        $model = $this->create([
            'YtConfigId' => $linha["ytconfigid"],
            'StrId' => str_replace("||", "", $linha["strid"]),
            'AnnotationClicks' => $linha["annotationclicks"],
            'CardClicks' => $linha["cardclicks"],
            'CardTeaserClicks' => $linha["cardteaserclicks"],
            'EstimatedMinutesWatched' => $linha["estimatedminuteswatched"],
            'Views' => $linha["views"],
            'AverageViewDuration' => $linha["averageviewduration"],
            'AverageViewPercentage' => $linha["averageviewpercentage"],
            'Likes' => $linha["likes"],
            'Dislikes' => $linha["dislikes"],
            'Shares' => $linha["shares"],
            'Comments' => $linha["comments"],
            'VideosAddedToPlaylists' => $linha["videosaddedtoplaylists"],
            'VideosRemovedFromPlaylists' => $linha["videosremovedfromplaylists"],
            'SubscribersGained' => $linha["subscribersgained"],
            'SubscribersLost' => $linha["subscriberslost"],
            'Published' => $linha["published"],
            'StartDate' => $linha["startdate"],
            'EndDate' => $linha["enddate"],
            'Created' => $linha["created"],
            'Updated' => Date("Y-m-d H:i:s"),
            'Actived' => true,
            'UserCreated' => 1,
            'UserUpdated' => 1
        ]);

        return $model;
    }
}
