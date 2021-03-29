<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProduitFormRequest;
use Maatwebsite\Excel\Concerns\FromCollection;

class MainController extends Controller implements FromCollection
{
    //

    public function afficherAcceuil(){
        return view('pages.front-office.welcome',
        [
            "nomSite"=>"Service en ligne",
            "nomMinistere"=>"        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus pariatur dolore, distinctio molestias magnam temporibus earum obcaecati odio aliquid delectus in debitis quo nam tempore. Enim magni quia sint magnam!
            "
        ]);
    }
    public function afficherProcedure($param){
        return view('pages.front-office.procedure',
        ["parametre"=>$param]);
    }

    public function collection()
    {
        return Produit::all();
    }


  public function   excelExport(){
return Excel::download($this,'produits.xls');
}

    //premiere approche
    public function ajouterProduit(){
        // $produit=new Produit();
        // $produit->uuid=Str::uuid();
        // $produit->designation=" Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ipsam, laborum commodi dignissimos deleniti nam iste saepe facere rem tempora officiis incidunt, modi ab labore rerum dolores laudantium ducimus beatae.";
        // $produit->prix="1000";
        // $produit->like="43";
        // $produit->pays_source="Burkina";
        // $produit->poids="45.3";
        // $produit->save();

        return view("pages.front-office.ajouter-produit");

    }


    public function enregistrerProduit(ProduitFormRequest $requete){



       $produit= Produit::create([
            'uuid'=>Str::uuid(),
            'designation'=>$requete->designation,
            'prix'=>$requete->prix,
            'like'=>23,
            'pays_source'=>$requete->pays_source,
            'poids'=>24,

        ]);
        return $produit;

dd($requete->designation);
    }

    public function ajouterCommande($id){
$commande=new Commande();
$commande->id_produit=$id;
$commande->uuid=Str::uuid();
$commande->save();

return redirect()->back()->with('statutC','Commande Ajoutée avec succes');


    }



    //deuxieme approche
    public function ajouterProduitEncore(){
        Produit::create([
            'uuid'=>Str::uuid(),
            'designation'=>" Mangue de Banfora",
            'prix'=>"200",
            'like'=>"43",
            'pays_source'=>"Burkina",
            'poids'=>"45.3",

        ]);


    }

    public function getList(){
        $produits=Produit::paginate(10);

        // $produit=Produit::first();

        // $user =User::first();

        // $users=$produit->users;


        // /// attacher
        // $produit->users()->detach($user);
        //         $users=$produit->users;



        //         dd($produit,$users);

       // dd($produits);
        return view("pages.front-office.list-produit",[
            "lesproduits"=>$produits,
            "lescommandes"=>Commande::paginate(10)
        ]);
    }


    public function updateProduit(ProduitFormRequest $requete){
      $modifierProduit= Produit::where('id',$requete->produit_id)->update([
        'designation'=>$requete->designation,
        'prix'=>$requete->prix,
        'pays_source'=>$requete->pays_source
      ]);
      return redirect()->route("produit.liste")->with('statut','le produit a été modifié');
    }


    public function modifierProduit($id){
       return view("pages.front-office.edit-produit",
    ["produit"=>Produit::find($id)]);
      }


    public function deleteProduit($id){
        $supprimer= Produit::where('id',$id)->delete();
        return redirect()->back()->with('statut','Supprimer avec succès');
      }


      public function deleteCommande($id){
        $supprimer= Commande::where('id',$id)->delete();
        return redirect()->back()->with('statutC',' Commande Supprimée avec succès');
      }








}
