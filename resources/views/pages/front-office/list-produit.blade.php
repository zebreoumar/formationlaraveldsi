<x-master-layout>


<div class="container">


    <div class="row">


        <div class="col-md-6 ">
            <h3>Liste des produits</h3>

       <div class="d-flex">
        <a class="btn btn-success mr-2 mb-2" href="{{ route('ajouter-produit') }}"  role="button">ajouter produit</a>

        <a class="btn btn-info mr-2  mb-2" href="{{ route('export-produit') }}"  role="button">exporter la liste</a>




       </div>



            @if (session('statut'))


            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>        {{ session('statut') }} </strong>

            </div>



                @endif

        @if ($lesproduits->count()>0)
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Designation</th>
            <th>Prix</th>
            <th>Pays Source</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($lesproduits as $leproduit )


        <tr>
            <td scope="row">{{ $leproduit->designation }}</td>
            <td>{{ $leproduit->prix }}</td>
            <td>{{ $leproduit->pays_source }}</td>
            <td >
                <div class="d-flex">

                    <a class="btn btn-danger mr-2" href="#" onclick="deleteConfirm('produitItem-{{$leproduit->id}}')" role="button"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg></a>

              <a class="btn btn-info mr-2" href="{{route('ajouter-commande',$leproduit->id)}}" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg></a>



              <a class="btn btn-info mr2" href="{{route('modifier-produit',$leproduit->id)}}" role="button"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16">
                <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.117 8.117 0 0 1-3.078.132 3.658 3.658 0 0 1-.563-.135 1.382 1.382 0 0 1-.465-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.393-.197.625-.453.867-.826.094-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.2-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.175-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.247-.013-.574.05-.88.479a11.01 11.01 0 0 0-.5.777l-.104.177c-.107.181-.213.362-.32.528-.206.317-.438.61-.76.861a7.127 7.127 0 0 0 2.657-.12c.559-.139.843-.569.993-1.06a3.121 3.121 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.591 1.927-5.566 4.66-7.302 6.792-.442.543-.796 1.243-1.042 1.826a11.507 11.507 0 0 0-.276.721l.575.575zm-4.973 3.04l.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043l.002.001h-.002z"/>
              </svg></a>
            </td></div>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $lesproduits->links() }}
        @else
<p>Aucun produit n'a été retrouvé</p>
        @endif
    </div>
        <div class="col-md-6">


            <h3>Liste des commandes</h3>
            @if (session('statutC'))


            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>


                    {{ session('statutC') }}

                </strong>
            </div>



                @endif
        @if ($lescommandes->count()>0)
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Designation</th>
                    <th>Prix</th>
                    <th>Pays Source</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lescommandes as $lecommande )


                <tr>
                    <td scope="row">{{ $lecommande->produit->designation ?? "introuvable" }}</td>
                    <td>{{ $lecommande->produit->prix ?? "introuvable" }}</td>
                    <td>{{ $lecommande->produit->pays_source ?? "introuvable" }}</td>
                    <td>
                        <a name="" id="" class="btn btn-danger"  href="#" onclick="deleteConfirm('commandeItem-{{$lecommande->id}}')" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg></a>
                      <form id="{{'commandeItem-'.$lecommande->id}}" action="{{ route('delete-commande', $lecommande->id) }}" method="GET">
                        @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $lescommandes->links() }}
                @else
        <p>Aucun produit n'a été retrouvé</p>
                @endif
        </div>
    </div>
</div>
</x-master-layout>
