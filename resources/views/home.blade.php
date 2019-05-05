@extends('main')

@section('title', 'Home ')

@section('content')
    
    <div class="col-8 offset-4">

        <h2> hi </h2>

        <div id="slider1" class="carousel slide" data-ride="carousel"> 
        
        <ol class="carousel-indicators">
             <li class ="active" data-target="#slider1" data-slide-to="0"> </li>
             <li data-target="#slider1" data-slide-to="1"> </li>
             <li data-target="#slider1" data-slide-to="2"> </li>
             {{--<li data-target="#slider1" data-slide-to="3"> </li>
             <li data-target="#slider1" data-slide-to="4"> </li>
             <li data-target="#slider1" data-slide-to="5"> </li> --}}
        </ol>
        
        
        <div class= "carousel-inner" role = "listbox"> 
        
            <div class = "carousel-item active"> 
                <img src = "{{ asset('img/image1.jpeg') }}" class ="d-block img-fluid" alt ="1st"> 
            </div>
            <div class = "carousel-item"> 
                <img src = "{{ asset('img/image2.jpeg') }}" class ="d-block img-fluid" alt ="2nd">
                
                <div class="carousel-caption">
                    <h4> </h4>
                    <p> </p>
                </div>    
            </div>
            <div class = "carousel-item">
                
                <img src = "{{ asset('img/image3.jpeg') }}" class ="d-block img-fluid" alt ="3rd">
                <div class="carousel-caption">
                    <h4>Second pic </h4>
                    <p>A bug on Twitter leaves Android users exposed </p>
                </div>
            </div>
            
        </div> <!-- carousel-inner -->
        
        
        <a href = "#slider1" class="carousel-control-prev" data-slide ="prev">             <span class= "carousel-control-prev-icon"> </span> 
        </a>
        
        
        
        <a href = "#slider1" class="carousel-control-next" data-slide ="next"> 
            <span class= "carousel-control-next-icon"> </span>
        </a>
        
        
    
    </div> <!-- slider1  -->
<div id="slider1" class="carousel slide" data-ride="carousel"> 
        
        <ol class="carousel-indicators">
            <li class ="active" data-target="#slider1" data-slide-to="0"> </li> 
             <li data-target="#slider1" data-slide-to="1"> </li>
             <li data-target="#slider1" data-slide-to="2"> </li>
             <li data-target="#slider1" data-slide-to="3"> </li>
             <li data-target="#slider1" data-slide-to="4"> </li>
             <li data-target="#slider1" data-slide-to="5"> </li>
        </ol>
        
        
        <div class= "carousel-inner" role = "listbox"> 
        
            <div class = "carousel-item active"> 
                <img src = "img/image1.jpg" class ="d-block img-fluid" alt ="1st"> 
            </div>
            <div class = "carousel-item"> <!-- active ক্লাসটা আর ইউজ হবে না  -->
                
                <img src = "img/image2.jpg" class ="d-block img-fluid" alt ="2nd">
                
                <div class="carousel-caption">
                    <h4>First pic </h4>
                    <p>A bug on Twitter leaves Android users exposed </p>
                </div>
                

                
            </div>
            <div class = "carousel-item">
                
                <img src = "img/image3.jpg" class ="d-block img-fluid" alt ="3rd">
                <div class="carousel-caption">
                    <h4>Second pic </h4>
                    <p>A bug on Twitter leaves Android users exposed </p>
                </div>
            </div>
            <div class = "carousel-item"> 
                
                <img src = "img/image4.jpg" class ="d-block img-fluid" alt ="4th">
                <div class="carousel-caption">
                    <h4>Third pic </h4>
                    <p>A bug on Twitter leaves Android users exposed </p>
                </div>
            </div>
            <div class = "carousel-item"> 
                
                <img src = "img/image5.jpg" class ="d-block img-fluid" alt ="5th">
                <div class="carousel-caption">
                    <h4>Fourth pic </h4>
                    <p>A bug on Twitter leaves Android users exposed </p>
                </div>
            </div>
            <div class = "carousel-item"> 
                
                <img src = "img/image6.jpg" class ="d-block img-fluid" alt ="5th"> 
            </div>
            
        
        </div> <!-- carousel-inner -->
        
        
        <a href = "#slider1" class="carousel-control-prev" data-slide ="prev"> 
    
            <span class= "carousel-control-prev-icon"> </span> 
        </a>
        
        
        
        <a href = "#slider1" class="carousel-control-next" data-slide ="next"> 
            <span class= "carousel-control-next-icon"> </span>
        </a>
        
        
    
    </div> <!-- slider1  -->





    </div> {{-- col --}}
    
    
@endsection

@section('scripts')
  <script>
     $('.carousel').carousel({
        interval : 5500,
        pause: 'hover',
        wrap: true,
        keyboard: true
     });
  </script>
@endsection