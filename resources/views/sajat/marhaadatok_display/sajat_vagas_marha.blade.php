@if (Route::has('login'))
            
                    @auth
   <tr>

     <div class="tabs">
  
<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-primary btn-sm">
    <input type="radio" name="options"  id="{{$option[0]='option1'}}" onchange="window.location.href='{{ route("meglevo_marha") }}'" autocomplete="off"  >Meglevők
</label>
  <label class="btn btn-primary btn-sm">    
    <input type="radio" name="options" id="{{$option[1]='option2'}}" onchange="window.location.href='{{ route("kikerult_marha") }}'" autocomplete="off" > Kikerültek
  </label>

  <label class="btn btn-primary btn-sm">
    <input type="radio" name="options" id="{{$option[2]='option3'}}" onchange="window.location.href='{{ route("elhullott_marha") }}'"  autocomplete="off"> Elhullottak
  </label>
   <label class="btn btn-primary btn-sm active">
    <input type="radio" name="options" id="{{$option[3]='option4'}}" onchange="window.location.href='{{ route("sajat_vagas_marha") }}'"  autocomplete="off" checked> Saját vágás

  </label>
</div>

    
        
          <div class="kiiras_neve">  
          {{$kiiras_neve}}
          </div>
          </div>
     </div>   

    </tr>

<tr class="kiiras-fejlec">
            <th>Törlés</th>
            <th>Enárszám</th>
            <th>Neve</th>
            <th>Neme</th>
            <th>Született</th>
            <th>Bekerülés datuma</th>
            <th>Saját vágás dátuma</th>
            <th>Anya neve</th>
            <th>Anya Enarszama</th>
           
    </tr>
        <div class="kiiras-body">
        @if(!empty($marha_adatok))
        @foreach($marha_adatok as $row)
  
        <tr>
                <td>
            <a title="Az adat törlése itt lehetséges" class="kiiras-del" href="{{ route('marha_torzs_delete',['id' =>$row->id]) }}">DEL</a>     
             </td>
            <td>
                    <a title="A sajat vágás visszavonasa itt lehetséges" class="kiiras-href" href="{{ route('sajat_vagas_visszavonasa',['id' =>$row->id]) }}">{{$row->enarszam}}</a>
                </td>
                    <td>{{$row->neve}}</td>
                    <td>{{$row->neme}}</td>
                    <td>{{$row->szuletes_datuma}}</td>
                    <td>{{$row->bekerult}}</td>
                    <td>
                        @if($row->sajat_vagas_datuma=='1000-01-01')
                            
                            @else
                                {{$row->sajat_vagas_datuma}}
                            @endif
                    </td>
                    <td>{{$row->anya_neve}}</td>
                    <td>{{$row->anya_enarszam}}</td>
                 
                </tr>
      @endforeach
      </div>

        <div class="kiiras-lapozo">   
        {{$marha_adatok->links()}}   
        </div>
      @endif

@endauth
@endif