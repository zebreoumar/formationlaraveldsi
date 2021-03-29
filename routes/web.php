<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;
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

Route::get('/',[MainController::class,'afficherAcceuil'])->name('acceuil');

Route::get('procedure/{param}', [MainController::class,'afficherProcedure'])->name('procedure');
Route::get('ajouterProduit', [MainController::class,'ajouterProduit'])->name('produit');
Route::get('ajouterProduitEncore', [MainController::class,'ajouterProduitEncore'])->name('a.p');



Route::get('produit/liste',              [MainController::class,'getList'])->name('produit.liste');
Route::post('modifierProduit',           [MainController::class,'updateProduit'])->name('update-produit');
Route::get('deleteProduit/{parame}',     [MainController::class,'deleteProduit'])->name('delete-produit');
Route::get('ajoutercommande/{parame}',   [MainController::class,'ajouterCommande'])->name('ajouter-commande');
Route::get('deleteCommande/{parame}',    [MainController::class,'deleteCommande'])->name('delete-commande');
Route::get('produits/ajouter',           [MainController::class,'ajouterProduit'])->name('ajouter-produit');
Route::post('produits/enregistrer',      [MainController::class,'enregistrerProduit'])->name('enregistrer-produit');
Route::get('produits/modifier/{produit}',[ProduitController::class,'edit'])->name('modifier-produit');

Route::get('excel-export',           [MainController::class,'excelExport'])->name('export-produit');


