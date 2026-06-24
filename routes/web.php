<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\WatchMiddleware;
use App\Models\Article;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

Route::get('/bonjour/users', function () {
    return "bonjour la L2";
})->name("salutation");

// Route::get('/statut', function(){
//     return response()->json([
//         'ok' => true
//     ]);
// });

// Route::get('/statut/http', function(){
//     return response()->json([
//         'ok' => true,
//         'textCode' => 'success'
//     ]);
// });

// route grouper
Route::name('http_status.')->prefix('statut')->group(function () {
    Route::get('', function () {
        return response()->json([
            'ok' => true
        ]);
    })->name('old');

    Route::get('/http', function () {
        return response()->json([
            'ok' => true,
            'textCode' => 'success'
        ]);
    })->name('new');
});

//Route::redirect('/statut','/statut/http',301);

//route dynamique
Route::get('/utilisateur/{id}/{name}', function (int $id, string $name) {
    return "utilisateur : $name avec pour ID : $id";
});

//route dynamique avec parametre optionnel
Route::get('/user/{id}/{name?}', function (int $id, string $name = 'dieudonne') {
    return "utilisateur : $name avec pour ID : $id";
})->where([
    'id' => '[0-9]+',
    'name' => '[a-zA-Z]+'
])->name('utilisateur'); //filtre avec les regex le "+" signifie qu'on peut repeté au tant de fois les valeur entre qui sont entre les crocher

//authentification

Route::name('auth.')->prefix('auth')->group(function () {

    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// route admin

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {

    Route::resource('categories', CategoryController::class);

    Route::resource('articles', ArticleController::class);

    Route::resource('staff', StaffController::class);
});


Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

Route::put('/orders/start/{order}', [OrderController::class, 'startDelivery'])->name('orders.start');

Route::put('/orders/delivered/{order}', [OrderController::class, 'deliveryConfirmed'])->name('orders.delivered');

//route public

Route::prefix('order')->name('order.')->group(function () {

    Route::post('/checkout', [OrderController::class, 'checkOutPage'])->name('checkout');

    Route::get('/callback', [OrderController::class, 'callback'])->name('callback');
});

Route::get('/', [HomeController::class, 'homePage'])->name('homePage');












































Route::get('/remplir/articles', function () {
    //supprimer tous les articles
    $result = DB::delete('delete from articles');

    dump($result);

    //ajouter 1000 article

    for ($i = 0; $i < 1000; $i++) {
        $result = DB::insert("insert into articles(label,current_price,description) values (?,?,?)", ["savon" . $i, 100, "savon pour se doucher"]);
    }

    //dump($result);

});

Route::get('/test/query-builder', function () {
    // dump(DB::table('articles')->select('label','current_price as price')
    // ->where('label','=','savon1')
    // ->where('price','>',75)
    // ->get());
    $query = DB::table('articles')->select(DB::raw('MAX(current_price) as max_price'));
    dump($query->get());
});

Route::get('/test/collection', function () {
    dump('collections test');
    $categorie = DB::table('categories')->get()
        //masque pour rendre chaque labelle de la collection en majiscule
        ->map(function ($value, $key) {
            return strtoupper($value->label);
        });



    dump($categorie);
});


Route::get('/test/models', function () {
    dump('Route de manipulation de modele');
    // dump(DB::table('categories')->get());
    // dump(Category::orderBy('id')->limit(10)->offset(20)->pluck('label'));
    // dump(Category::query()->get());


    //$categorie = Category::find(3);
    // $categorie->description = 'veste';
    // $categorie->save();

    $categorie = Category::first();
    dump($categorie->articles()->get());

    $article = Article::first();
    dump($article->label);

    //$article->label = 'dieudonne';
    dump($article->label);



    // $categorie = new Category();
    // $categorie->label = 'vêtement';
    // $categorie->slug = 'produit vêtement';
    // $categorie->save();
    // dump($categorie);
    //dump(DB::table('categories')->get());

    // $article = new Article();
    // $article->label = 'pain';
    // $article->save();
});

// Route::get('/exercice', function(){
//     dump(Category::query()->select('categories.label',
//     DB::raw('count(distinct a.id) as nb_articles'),
//     DB::raw('avg(a.current_price) as prix_moyen'),
//     DB::raw ('sum(ol.amount ) as chiffre_affaires'))
//     ->join('articles as a', 'a.id_categorie', '=', 'categories.id')
//     ->join('order_lines as ol', 'ol.article_id', '=', 'a.id')
//     ->where ('categories.is_active', '=', 1)
//     ->where ('a.is_active', '=', 1)
//     ->groupBy ('categories.id', 'categories.label')
//     ->orderBy('chiffre_affaires', 'desc')
//     ->get()
//     );
// });

Route::get('/test/relation', function () {
    // $articles = Article::query()->select('articles.label as libelle','categories.label as category')->join('categories','articles.category_id','=', 'categories.id')->get();
    // dump('Article : nom article, Categorie : nom categorie');
    //dd('message 2'); //die and dump
    $articles = Article::with('category')->get();
    foreach ($articles as $article) {
        $c_label = $article->category->label;
        dump("Article : $article->label, Categorie : $c_label");
    }

    dump($articles);
});

Route::get('/exercice', function () {
    $clients = Client::with('user')->get();
    $staffs = Staff::with('user')->get();


    $orders = Order::with('client')->get();
    foreach ($orders as $order) {
        $c_name = $order->client->user->firstname;
        dump("Order : $order->id, Client : $c_name");
    }

    foreach ($clients as $client) {
        $c_name = $client->user->firstname;
        dump("Client : $client->id, Name : $c_name");
    }

    foreach ($staffs as $staff) {
        $s_name = $staff->user->firstname;
        dump("Staff : $staff->id, Name : $s_name");
    }

    dump($clients);
    dump($staffs);

    $orders = Order::with('articles')->get();

    dump($orders);

    dump(Article::first()->orders);
});
