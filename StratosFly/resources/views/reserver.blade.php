@extends('template')

@section('title', 'StratosFly - Reserver')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                Vol 1 :
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <form action="">
                    <p>Voyagez vous seul ?</p>
                    <label class="form-label" for="name">Nom</label>
                    <input id="name" name="nom" type="text" class="form-control">
                    <label class="form-label" for="prenom">Prénom</label>
                    <input id="prenom" name="prenom" type="text" class="form-control">
                    <br>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection