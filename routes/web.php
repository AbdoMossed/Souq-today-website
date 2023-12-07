<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\GoldController;
use App\Http\Controllers\ArticleController;
use App\Models\Currency;
use App\Models\Gold;
use App\Models\Article;
use App\Models\ArticleRead;
use App\Models\ArticleComment;
use App\Models\BlackMarketPrices;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function()
        {
            Route::get('/', function () {
                $articles = Article::where('popular', 1)->get();
                return view('home',compact('articles'));
            });

            Route::get('gold', function () {
                $type = 'Gold';

                return view('gold',compact('type'));
            });
            
            Route::get('gold/{id}', function ($id) {
                $type = 'Gold';
                return view('currency',compact('id','type'));
            });

            Route::get('currency/{id}', function ($id) {
                $type = 'Currency';
                return view('currency',compact('id', 'type'));
            });

            Route::get('currencies', function () {
                $type = 'Currency';
 
                return view('currencies',compact('type'));
            });

            Route::get('news', function () {
                $articles = Article::withCount('comments')->get();

                return view('news',compact('articles'));
            });

            Route::match(['post', 'get'],'article/{id}', function ($id ,Request $request) {
                $articles = Article::get();
                $nextArticles = Article::inRandomOrder()->where('id','!=',$id)->limit(4)->get();  
                $article = $articles->where('id',$id)->first();
                $clientIpAddress = $request->getClientIp();
                $articleComments = ArticleComment::orderBy('created_at','DESC')->get();
                ArticleRead::updateOrInsert([
                        'article_id' => $id,
                        'ip_address' => $clientIpAddress
                    ],
                    [
                        'article_id' => $id,
                        'ip_address' => $clientIpAddress
                    ]
                );
                $count = ArticleRead::where('article_id',$id)->count();   
                return view('article',compact('article','nextArticles','count','articleComments'));
            });
        });


Route::get('index',[CurrencyController::class,'index']);
// Route::get('index',[ArticleController::class,'index']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

