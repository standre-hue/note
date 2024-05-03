@extends('home.layout')

@section('content')
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Single Product Page</h2>
                    <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
input, textarea{
    width: 400px;
}
label{
    width:100px;
}
</style>
<form action="" method="post">
    @csrf
    <div>
        <div>
            <label for="">Critère</label>
            <input type="text" disabled value="{{ $rating->name }}" name="" id="">
        </div>
        <div>
            <label for="">Etablissement</label>
            <input type="text" disabled value="{{ $school->name }}" name="" id="">
        </div>
        <div>
            <label for="">Note*</label>
            <input type="number" max='10' min='0' required name="number" id="">
        </div>
        
        <div>
            <label for="">Commentaire</label>
            <textarea type="text" name="comment" id="">
            </textarea>
        </div>
        

        
        <br>
        <button class="btn btn-primary">
            Soumettre
        </button>
    </div>
</form>
@endsection('content')