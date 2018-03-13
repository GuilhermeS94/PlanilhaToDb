<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Maatwebsite\Excel\Facades\Excel;
use App\FbInsightsNaoIncluso;
use App\FbInsightsNaoInclusoItau;
use App\FbInsightsMes;
use App\DbmDados;
use App\OticasLojas;
use App\OticasLojasNovo;
use App\YoutubeVideoDados;

class HomeController extends Controller
{
    // public function dbm() {
    //     ini_set('max_execution_time', 0);//post por 30 segundos de solicitação, assim fica infinito 
    //     $resposta = array();
    //     $obj = new DbmDados();

    //     $data = Excel::load("1505740145705.xlsx", function($reader) {
	// 		})->get();
	// 		if(!empty($data) && $data->count()){
	// 			foreach ($data as $item) {
	// 				//$insert[] = $item;
    //                 //$obj->Salvar($item);
    //                 //Dbm
    //                 if(is_null($linha["data"])) break;

    //                 $insert[] = $obj->Salvar($item);
	// 			}
	// 		}

    //     return Response::json($insert);

    // }

    public function facebook() {
        ini_set('max_execution_time', 0);//post por 30 segundos de solicitação, assim fica infinito 
        $insert = array();
        $obj = new FbInsightsNaoInclusoItau();

        $data = Excel::load("campanhas-inativas.xlsx", function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $item) {
					//$insert[] = $item;
                    //$obj->Salvar($item);
                    //Dbm
                    //if(is_null($linha["data"])) break;

                    $insert[] = $obj->Salvar($item);
				}
			}

        return Response::json($insert);

    }

    // public function oticas(){
    //     ini_set('max_execution_time', 0);//post por 30 segundos de solicitação, assim fica infinito 
    //     $resposta = array();
    //     $obj = new OticasLojasNovo();

    //     $data = Excel::load("SITE_LOJAS_080118.xlsx", function($reader) {
    //         })->get();
    //         if(!empty($data) && $data->count()){
    //             foreach ($data as $item) {
    //                 //$insert[] = $item;
    //                 //$obj->Salvar($item);
    //                 //Dbm
    //                 //if(is_null($linha["data"])) break;
    //                 //dd($item);

    //                 $insert[] = $obj->Salvar($item);
    //             }
    //         }

    //     return Response::json($insert);
    // }

    // public function oticas(){
    //     ini_set('max_execution_time', 0);//post por 30 segundos de solicitação, assim fica infinito 
    //     $resposta = array();
    //     $obj = new OticasLojas();

    //     $data = Excel::load("SITE_LOJAS_080118.xlsx", function($reader) {
    //         })->get();
    //         if(!empty($data) && $data->count()){
    //             foreach ($data as $item) {
    //                 //$insert[] = $item;
    //                 //$obj->Salvar($item);
    //                 //Dbm
    //                 //if(is_null($linha["data"])) break;
    //                 //dd($item);

    //                 $insert[] = $obj->Salvar($item);
    //             }
    //         }

    //     return Response::json($insert);
    // }

    // public function youtube(){
    //     ini_set('max_execution_time', 0);//post por 30 segundos de solicitação, assim fica infinito 
    //     $resposta = array();
    //     $obj = new YoutubeVideoDados();

    //     $data = Excel::load("YoutubeVideoDados.xlsx", function($reader) {
    //         })->get();
    //         if(!empty($data) && $data->count()){
    //             foreach ($data as $item) {

    //                 $insert[] = $obj->Salvar($item);
    //             }
    //         }

    //     return Response::json($insert);
    // }
}
