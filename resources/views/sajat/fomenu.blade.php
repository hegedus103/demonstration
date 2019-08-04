


{{--Megjegyzes--}}
<div class='fomenu-keret'>
<table>
<tr>    
        <td>
        
                        <div class="fomenu-plakatimage">
                {{ Html::image('img/logo_02.png', 'a picture') }}
                </div>
        </td>


            <td>
            @if (Route::has('login'))
          
                
                    @auth
                    <div class="fomenu-login-gomb fomenu-links fomenu-borderr">
                        <a href="{{ route('home') }}">Tovább a munkasztalra</a>
                    </div>
                    @else
                </td>
                <td>
                     <div class="fomenu-login-gomb fomenu-links fomenu-borderr">
                        <a href="{{ route('login') }}">Belépés</a>
                    </div>
                </td>
                        @if (Route::has('register'))
                     <td>  
                        <div class="fomenu-login-right fomenu-links fomenu-borderr">
                            <a href="{{ route('register') }}">Regisztráció
                            </a>
                        </div>
                    </td>        
                        @endif
                    @endauth
          
            @endif
        
    </tr>   
</table>
</div>