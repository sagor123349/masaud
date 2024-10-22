<style>
 @property --rotate{
    syntax: "<angle>";
    initial-value: 132deg;
    inherits: false;
}

:root{
    --bg01:#0F051D;
    --bg02:#fff;
    --bg03:#ff00ea;
    --bg04:#2600fc;
    --bg05:#741ff5;
    --bg06:linear-gradient(25deg,#ff00ff,#4020f4fd);

}

*{

    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'poppins', sans-serif;
  

}


.banner{
    width: 100%;
   height: 100vh;
   text-align: center;
   overflow: hidden;
   position: relative;
   
}

.banner .slider{
    position: absolute;
    width: 200px;
    height: 250px;
   
    top: 10%;
    left: calc(50% - 100px);
    transform: perspective(1200px);
    transform-style: preserve-3d;
    animation: autoRun 20s linear infinite;
    transition: 1s ease-out;
   
}

.banner .slider .item::before{
    content: '';
    display: block;
    background: linear-gradient(var(--rotate), var(--bg03), var(--bg04));
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: -1 !important;
    left: 0;
    top: 0;
    border-radius: 38px;
    animation: spin 2.5s linear infinite;
    scale: 1.046;
    box-shadow: 0px 10px 30px rgba(0,0,0,0.185);
}

.banner .slider .item::after{
    position: absolute;
    content: '';
    left: 0;
    right: 0;
    z-index: -2;
    height: 100%;
    width: 100%;
    margin: 0 auto;
    transform: scale(1.2);
    background: linear-gradient(var(--rotate), var(--bg03), var(--bg04));
    transition: opacity 0.5s;
    animation: spin 2.5s linear infinite;
    filter: blur(80px);
    border-radius: 40px;
    opacity: 0.3;

}
@keyframes spin{
    0%{
        --rotate: 0deg;
    }
    100%{
        --rotate: 360deg;
    }
}

@keyframes autoRun{
    form{
        transform: perspective(1200px) rotateX(-16deg) rotateY(0deg);
    }to{
        transform: perspective(1200px) rotateX(-16deg) rotateY(360deg);
    }
        
    
}

.banner .slider .item{
    position: absolute;
   
    inset: 0 0 0 0;
    transform:
           rotateY(calc( (var(--position) - 1) * (360 / var(--quantity)) * 1deg))
    translateZ(400px);


}

.banner .slider .item img{
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius:40px;
}


a,
button,
input{
    outline: none;
    border: none;
    text-decoration: none;
    user-select: none;
}
body{
    background-color: var(--bg01);
}

.btn-area .btn{
    
   color:#fff;
    padding: 10px 24px;
background:var(--bg01);
    align-items: center;
    font-size: 16px;
    text-align: center;
    border-radius: 50px;
  
    border: none;
    font-weight: 600;
    cursor: pointer;
    position: relative;
    margin-top:5%;
    top: 10%;
    left: calc(50% - 100px); 
    margin: 20px 10px;
    
    
}


.ms{color:#fff;
    display: flex;
    height: 200px;
    width: 100%;
    background:var(--bg01);
    border-radius:50px;
    justify-content: center;  /* Centers horizontally */
    align-items: center;  
}
.ms h1{
    font-size:40px;
}
.ms h1::first-letter{
    font-size: 40px;
    color: #ff00ea;;
    font-weight: 900;
}



.btn-area .btn::before{
    content: '';
    display: block;
    background: linear-gradient(var(--rotate), var(--bg03), var(--bg04));
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: -1 !important;
    left: 0;
    top: 0;
    border-radius: 38px;
    animation: spin 2.5s linear infinite;
    scale: 1.046;
    box-shadow: 0px 10px 30px rgba(0,0,0,0.185);
}


.btn-area .btn::before{
    content: '';
    display: block;
    background: linear-gradient(var(--rotate), var(--bg03), var(--bg04));
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: -1 !important;
    left: 0;
    top: 0;
    border-radius: 38px;
    animation: spin 2.5s linear infinite;
    scale: 1.046;
    box-shadow: 0px 10px 30px rgba(0,0,0,0.185);
}

.btn-area .btn::after{
    position: absolute;
    content: '';
    left: 0;
    right: 0;
    z-index: -2;
    height: 100%;
    width: 100%;
    margin: 0 auto;
    transform: scale(1.2);
    background: linear-gradient(var(--rotate), var(--bg03), var(--bg04));
    transition: opacity 0.5s;
    animation: spin 2.5s linear infinite;
    filter: blur(80px);
    border-radius: 40px;
    opacity: 0.3;

}
@keyframes spin{
    0%{
        --rotate: 0deg;
    }
    100%{
        --rotate: 360deg;
    }
}


.OC-Btn{

    background: transparent;
    font-size: 20px;
    padding: 20px;
    color: #fff;
    display: none;
}

   
@media only screen and (max-width:1000px){
    .banner .slider{
        transform: perspective(5000px);

    }
    .banner .slider .item{
        transform:  rotateY(calc( (var(--position) - 1) * (360 / var(--quantity)) * 1deg))
        translateZ(350px);
       
    }
       
    
}
@media only screen and (max-width:480px){
    .banner .slider{
        transform: perspective(1000px);

    }
    .banner .slider .item{
        transform:  rotateY(calc( (var(--position) - 1) * (360 / var(--quantity)) * 1deg))
        translateZ(180px);
       
    }
       
    
.banner .slider{
    width: 100px;
    height: 140px;
    margin-left: 15%;
    margin-top: 100px;
}
} 

</style>



@if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        
                                        <div class="btn-area">
                                        <button class="btn">Dashboard</button>
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                    
                                        <div class="btn-area">
                                        <button class="btn">Login</button>
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            <div class="btn-area">
                            <button class="btn">Register</button>
                            
                        </div>
                                        
                                          
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                   @endif

          
<div class="ms">
<h1>Welcome MS</h1></div>
                        <div class="banner">
    <div class="slider" style="--quantity: 10">
        <div class="item" style="--position: 1"><img src="https://images.pexels.com/photos/1827838/pexels-photo-1827838.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load" alt=""></div>
        <div class="item" style="--position: 2"><img src="https://images.pexels.com/photos/733745/pexels-photo-733745.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt=""></div>
        <div class="item" style="--position: 3"><img src="https://images.pexels.com/photos/1025469/pexels-photo-1025469.jpeg?auto=compress&cs=tinysrgb&w=600" alt=""></div>
        <div class="item" style="--position: 4"><img src="https://media.istockphoto.com/id/1433523815/photo/3d-render-of-cyber-punk-night-city-landscape-concept-light-glowing-on-dark-scene-night-life.jpg?s=1024x1024&w=is&k=20&c=hXf4cl_GicF9Au0_SGKfDLasP9dRntaS3t55dc_NOGM=" alt=""></div>
        <div class="item" style="--position: 5"><img src="https://media.istockphoto.com/id/1143112926/photo/smoke-neon-glowing-psychedelic-vibrant-cosmic-ultraviolet-fluorescent-luxurious-luminous-sci.jpg?s=1024x1024&w=is&k=20&c=nxoFV80gdG-BIwobsSG0tvG9XdPW0gAj0SlXOfOYXAM=" alt=""></div>
        <div class="item" style="--position: 6"><img src="https://images.pexels.com/photos/769525/pexels-photo-769525.jpeg?auto=compress&cs=tinysrgb&w=600" alt=""></div>
        <div class="item" style="--position: 7"><img src="https://media.istockphoto.com/id/1393475645/photo/highway-with-neon-background-3d-rendering.jpg?s=1024x1024&w=is&k=20&c=wCPFgz9YvgbxtVFMJfUMigDraZT2CcmqbGeYNBfgbpY=" alt=""></div>
        <div class="item" style="--position: 8"><img src="https://images.pexels.com/photos/4100130/pexels-photo-4100130.jpeg?auto=compress&cs=tinysrgb&w=600" alt=""></div>
        <div class="item" style="--position: 9"><img src="https://media.istockphoto.com/id/1433281546/photo/3d-render-of-neon-and-light-glowing-on-dark-scene-cyber-punk-night-city-concept-night-life.jpg?s=1024x1024&w=is&k=20&c=_VuDFfvG8sJZZ9ZJPgyCQQkEbAXQclPEFsjzlmJYQ6A=" alt=""></div>
        <div class="item" style="--position: 10"><img src="https://images.pexels.com/photos/1910225/pexels-photo-1910225.jpeg?auto=compress&cs=tinysrgb&w=600" alt=""></div>
        
        
    </div>
  </div>