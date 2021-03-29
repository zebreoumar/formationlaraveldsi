<x-master-layout>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
                    <h1>Ajout d'un nouveau produit</h1>
                    <hr>
        <form action="{{ route('enregistrer-produit') }}" method="post" >
            @method("POST")
            @csrf
            <div class="form-group">
          <label for="">Designation</label>
          <input value="{{ old('designation') }}" type="text"
            class="form-control" name="designation" id="" aria-describedby="helpId" placeholder="">
        </div>
        @error('designation')
     <span class="alert-danger">{{dump($message) }}</span>
        @enderror
        <div class="form-group">
          <label for="">Prix</label>
          <input type="number"
            class="form-control" name="prix" id="" aria-describedby="helpId" placeholder="">
        </div>

        <div class="form-group">
          <label for="pays">Pays Source</label>
          <select class="form-control" name="pays_source" id="pays">
            <option value="Burkina" {{ old('pays_source')=='Burkina' ? 'selected':'' }} >Burkina</option>
            <option value="senegal" {{ old('pays_source')=='senegal'? "selected ":'' }}>Senegal</option>
            <option value="mali" {{ old('pays_source')=='mali'? "selected":'' }}>Mali</option>
          </select>
        </div>

        <button type="submit" class="btn btn-block btn-success">Valider</button>


        </form>
    </div>

    </div>
</div>
</x-master-layout>
