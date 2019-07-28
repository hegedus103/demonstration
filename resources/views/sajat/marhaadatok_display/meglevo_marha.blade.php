@if (Route::has('login'))
            
                    @auth
   <tr>
  

     <div class="tabs">
 
<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-primary btn-sm active">
    <input type="radio" name="options"  id="{{$option[0]='option1'}}" onchange="window.location.href='{{ route("meglevo_marha") }}'" autocomplete="off" checked >Meglevők
</label>

  <label class="btn btn-primary btn-sm">    
    <input type="radio" name="options" id="{{$option[1]='option2'}}" onchange="window.location.href='{{ route("kikerult_marha") }}'" autocomplete="off" > Kikerültek
  </label>

  <label class="btn btn-primary btn-sm">
    <input type="radio" name="options" id="{{$option[2]='option3'}}" onchange="window.location.href='{{ route("elhullott_marha") }}'"  autocomplete="off"> Elhullottak
  </label>

   <label class="btn btn-primary btn-sm">
    <input type="radio" name="options" id="{{$option[3]='option4'}}" onchange="window.location.href='{{ route("sajat_vagas_marha") }}'"  autocomplete="off"> Saját vágás

  </label>
  </div>
  </div>
 </tr>
<tr>
          <div class="kiiras_neve">  
          {{$kiiras_neve}}
          
          </div>
    </tr>
  <tr class="kiiras-fejlec">
            <th>Törlés</th>
            <th>Enárszám</th>
            <th>Neve</th>
            <th>Neme</th>
            <th>fajta</th>
            <th>szine</th>
            <th>Született</th>
            <th>Bekerülés datuma</th>
            <th>Anya enarszam</th>
            <th>Kikerült</th>
            <th>Elhullott</th>
            <th>Saját vágás</th>
            <th>Anya enarszám</th>
            <th>Anya neve</th>
             <th>Származás</th>
             <th>Járlat sorszáma</th>
             <th>Járlat kiadása</th>
            
             
    </tr>
<div class="kiiras-body">
      @if(!empty($marha_adatok))
        @foreach($marha_adatok as $row)
    
  <tr>

                    <td>
                      <a title="Az adat törlése itt lehetséges" class="kiiras-del" href="{{ route('marha_torzs_delete',['id' =>$row->id]) }}">DEL</a>   
                    </td>

                    <td>
                    <a title="Az adat módosítása itt lehetséges" class="kiiras-href" href="{{ route('marha_torzs_get_edit',['id' =>$row->id]) }}">{{$row->enarszam}}</a>
                    </td>
                    <td>{{$row->neve}}</td>
                    <td>{{$row->neme}}</td>
                     <td>{{$row->fajta}}</td>
                    <td>{{$row->szine}}</td>
                    <td>{{$row->szuletes_datuma}}</td>
                    <td>{{$row->bekerult}}</td>
                    <td>{{$row->anya_enarszam}}</td>
                    <td>
                    <a title="Az adat módosítása itt lehetséges" class="kiiras-href" href="{{ route('kikerules_marha_edit',['id' =>$row->id]) }}">
                        @if ($row->kikerules=='0')
                        false
                        @else 
                        true
                        @endif
                    </a>
                    </td>
                     <td>
                    <a title="Az adat módosítása itt lehetséges" class="kiiras-href" href="{{ route('elhullas_marha_edit',['id' =>$row->id]) }}">
                        @if ($row->elhullas=='0')
                        false
                        @else
                        true
                        @endif
                    </a>
                    </td>
                    <td>
                    <a title="Az adat módosítása itt lehetséges" class="kiiras-href" href="{{ route('sajat_vagas_marha_edit',['id' =>$row->id]) }}">
                        @if ($row->sajat_vagas=='0')
                        false
                        @else 
                        true
                        @endif
                    </a>
                    </td>
                    <td>{{$row->anya_enarszam}}</td>
                    <td>{{$row->anya_neve}}</td>
                    <td>{{$row->szarmazas_tenyeszet}}</td>
                    <td>{{$row->jarlat_sorszama}}</td>
                    <td>{{$row->jarlat_kiadasa}}</td>
     
                </tr>

                
            @endforeach
          </div>
         <div class="kiiras-lapozo">   
       {{$marha_adatok->links()}}   
        </div>
    @endif

@endauth
@endif