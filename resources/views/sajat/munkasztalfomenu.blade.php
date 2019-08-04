

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
            <div class="fomenu-user" ><a>{{Auth::user()->name}}</a></div>
        </td>>
		<td>

            
                <div class="fomenu-login-ora fomenu-links fomenu-borderr">
                        <a id="minutes">Kiléptetés :0-00</a>
                </div>
     	</td>
		        @if (Route::has('login'))
            
                    @auth
        <td>
                     <div class="fomenu-login-right fomenu-links fomenu-borderr">
                        <a href="{{ route('logout') }}" id="kilepes_programbol">Kilépés</a>
                   </div>
        </td>
                    @endauth
 	
 			  

            @endif
        	
 </tr>
 </table>		
 </div>	
 <script type="text/javascript" >szamlalo_belso();</script>
 			 
