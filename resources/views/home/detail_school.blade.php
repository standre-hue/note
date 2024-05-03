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
<!-- ***** Main Banner Area End ***** -->


<!-- ***** Product Area Starts ***** -->
<section class="section" id="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
            <div class="left-images">
                <img src="{{ $images->first()->path }}" style="height: 500px; object-fit:cover" alt="">
                @php
                    $second = $images->skip(1)->take(1)->first();
                @endphp
                @if ($second)
                    <img src="{{ $second->path }}" alt="">
                @endif
                
            </div>
        </div>
        <div class="col-lg-4">
            <div class="right-content">
                <h4>{{ $school['name'] }}</h4>
                
                <div style="margin-top:10px">
                    <h5>Address :</h5>
                    <h5>{{ $school['address']}}</h5>
                </div>

                <div style="margin-top:10px">
                    <h5>Email :</h5>
                    <h5>{{ $school['email']}}</h5>
                </div>

                <div style="margin-top:10px">
                    <h5>Numero :</h5>
                    <h5>{{ $school['phone_number']}}</h5>
                </div>

                
                <span>Information Supplementaire:{{ $school['information'] }} </span>
                
                <!--<div class="quantity-content">
                    <div class="left-content">
                        <h6>No. of Orders</h6>
                    </div>
                    <div class="right-content">
                        <div class="quantity buttons_added">
                            <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                        </div>
                    </div>
                </div>

                <div class="total">
                    <h4>Total: $210.00</h4>
                    <div class="main-border-button"><a href="#">Add To Cart</a></div>
                </div>-->
            </div>
        </div>
        <div style="margin-top:20px">
            <h4>
                Critère
            </h4>

            <div>
                @foreach ($school['ratings'] as $rating)
                <h4 style="margin-bottom:10px; display:flex;justify-content: space-between">
                    {{ $rating['name'] }} : {{ $rating['average'] }}/10

                    @auth
                    @if ($rating['name'] == 'Education' and $is_education_activated == false)
                    <a href="/rate?school_id={{$school['id']}}&rating_id={{$rating['id']}}">
                        <button class="btn btn-primary" style="margin-left:20px">
                            Noter
                        </button>
                    </a>
                    @endif
                    @if ($rating['name'] == 'Cadre Scolaire' and $is_frame_activated == false)
                    <a href="/rate?school_id={{$school['id']}}&rating_id={{$rating['id']}}">
                        <button class="btn btn-primary" style="margin-left:20px">
                            Noter
                        </button>
                    </a>
                    @endif
                    @endauth
                    
                    
                   
                </h4>
                @endforeach
                
            </div>
        </div>
        </div>
    </div>
</section>

<style>
    body {
    background-color: #f7f6f6
}

.card {
    
    border: none;
    box-shadow: 5px 6px 6px 2px #e9ecef;
    border-radius: 4px;
}


.dots{

    height: 4px;
  width: 4px;
  margin-bottom: 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}

.badge{

        padding: 7px;
        padding-right: 9px;
    padding-left: 16px;
    box-shadow: 5px 6px 6px 2px #e9ecef;
}

.user-img{

    margin-top: 4px;
}

.check-icon{

    font-size: 17px;
    color: #c3bfbf;
    top: 1px;
    position: relative;
    margin-left: 3px;
}

.form-check-input{
    margin-top: 6px;
    margin-left: -24px !important;
    cursor: pointer;
}


.form-check-input:focus{
    box-shadow: none;
}


.icons i{

    margin-left: 8px;
}
.reply{

    margin-left: 12px;
}

.reply small{

    color: #b7b4b4;

}


.reply small:hover{

    color: green;
    cursor: pointer;

}
</style>
<div class="container mt-5" >

    <div class="row  d-flex justify-content-center" style="width:100%">

        <div class="col-md-8" style="width:100%">

            <div class="headings d-flex justify-content-between align-items-center mb-3">
               <h5>Notes({{ $note }})</h5>
            </div>


            @foreach ($school['ratings'] as $rating)
            @foreach ($rating['notes'] as $note)
            
            <div class="card p-3 mb-2" style="width:100%">
               
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center">
          
                          <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="user-img rounded-circle mr-2">
                          <span><small style="font-size: 20px" class="font-weight-bold text-primary">{{ App\Models\User::find($note['user_id'])->name }}</small>&nbsp&nbsp  {{ $rating["name"]}} &nbsp&nbsp {{$note['number'] }}/10 <small class="font-weight-bold">  </small></span>
                            
                        </div>
                        <small></small>
                      </div>
                   

            


              <div class="action d-flex justify-content-between mt-2 align-items-center">

                <div class="reply px-4">
                    {{ $note['comment'] }}
                </div>

 
                  
              </div>


                
            </div>
            @endforeach
            @endforeach






            






            


            
        </div>
        
    </div>
    
</div>

@endsection('content')