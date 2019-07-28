@if (Route::has('login'))
            
                    @auth
<div class="kiiras-alap">
<div class="kiiras">


  {{ csrf_field() }}
 
<table>
    @if($kiiras_neve=='Meglevo marha adatok')
    @include('sajat.marhaadatok_display.meglevo_marha')
    @endif
    @if($kiiras_neve=='Kikerült marha adatok')
    @include('sajat.marhaadatok_display.kikerult_marha')
    @endif
    @if($kiiras_neve=='Elhullott marha adatok')
    @include('sajat.marhaadatok_display.elhullott_marha')
    @endif
    @if($kiiras_neve=='Sajat vagas marha adatok')
    @include('sajat.marhaadatok_display.sajat_vagas_marha')
    @endif
    
  
<tr></tr>
<tr>
  
</tr>
</table>
 <div class="kiiras-bevitel">
  <a href="{{ route('marha_torzs_bevitel_vue') }}" class='btn btn-info'>
    Törzsbevitel
  </a>
</div>

  <div class="kiiras-cancel">
    <a href="{{ route('marha_display') }}" class='btn btn-info'>Cancel</a>
       <!-- {!! Form::submit('Cancel', ['class' => 'btn btn-info']) !!}-->
    </div>
<!--{!! Form::close() !!}-->
</div>
</div>
@endauth
@endif