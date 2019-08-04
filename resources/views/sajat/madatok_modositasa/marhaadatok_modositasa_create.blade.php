
<div class="bevitel-dialog">

@if(!empty($AllatokMarha))    
{!!Form::open(array('route' => array('marha_torzs_update',$AllatokMarha,$AllatokMarha->id)))!!}
  {{ csrf_field() }}
 {{ method_field('PUT') }}
 <div class="bevitel-fejlec">{{ __('Marha Törzsadat módosítás') }}</div>

<div class="bevitel-body"><br>
<div class="form-group">
	
    {{ Form::model($AllatokMarha, array('route' => array('marha_torzs_update',$AllatokMarha,$AllatokMarha->id, 'method' => 'UPDATE'))) }}
 
    {!! Form::label('enarszam', 'Enarszám',['class' => 'col-lg-5 control-label'])!!}
    {!!Form::text('enarszam',null,['class' => 'col-lg-4 control-label','readonly','title'=>'Ezt most nem változtathatod meg ha nem jó töröld le az egész adatot!',]) !!}
  @if ($errors->has('enarszam'))
    <div class="bevitel-error-szine">{{ $errors->first('enarszam') }}</div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('neve', 'Az állat neve',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::text('neve', null,['class' => 'col-lg-4 control-label','title'=>'',]) !!}
    @if ($errors->has('neve'))
    <div class="bevitel-error-szine">{{ $errors->first('neve') }}</div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('neme', 'Az állat neme',['class' => 'col-lg-5 control-label']) !!}
	{!! Form::select('neme',['noivaru' => 'Nőivaru','himivaru' => 'Hímivaru'],$AllatokMarha->neme,['class' => 'col-lg-4 control-label','title'=>'',]) !!}
      @if ($errors->has('neme'))
    <div class="bevitel-error-szine">{{ $errors->first('neme') }}</div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('fajta', 'Fajta',['class' => 'col-lg-5 control-label']) !!}
	{!! Form::select('fajta',['magyartarka' => 'Magyartarka','limousin' => 'Limousine','lapaly' => 'Lapály marha','feher_kek' => 'Fehér-kék belga','hereford' => 'Hereford','hersey' => 'Hersey','magyarszurke' => 'Magyar Szürke','egyebbhushasznu' => 'Egyébb húshasznú'],$AllatokMarha->fajta,['class' => 'col-lg-4 control-label','title'=>'',]) !!}
     @if ($errors->has('fajta'))
    <div class="bevitel-error-szine">{{ $errors->first('fajta') }}</div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('szine', 'Színe',['class' => 'col-lg-5 control-label']) !!}
	{!! Form::select('szine',['vorostarka' => 'Vöröstarka','feketetarka' => 'Fekete-tarka','zsemletarka' => 'Zsemletarka','fekete' => 'Egyszínű fekete','voros' => 'Egyszínű vörös','feketevoros' => 'Fekete-vörös','egyebbtarka' => 'Egyébb-tarka','egyebb' => 'Egyszínű-egyébb'],$AllatokMarha->szine,['class' => 'col-lg-4 control-label','title'=>'',]) !!}
      @if ($errors->has('szine'))
    <div class="bevitel-error-szine">{{ $errors->first('szine') }}</div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('szuletes_datuma', 'Születés dátuma',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::date('szuletes_datuma',$AllatokMarha->szuletes_datuma ,['class' => 'col-lg-4 control-label','title'=>'',]) !!}
      @if ($errors->has('szuletes_datuma'))
    <div class="bevitel-error-szine">{{ $errors->first('szuletes_datuma') }}</div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('bekerult', 'Bekerült',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::date('bekerult',$AllatokMarha->bekerult,['class' => 'col-lg-4 control-label','title'=>'',]) !!}
    @if ($errors->has('bekerult'))
    <div class="bevitel-error-szine">{{ $errors->first('bekerult') }}</div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('anya_neve', 'Az anya neve',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::text('anya_neve',$AllatokMarha->anya_neve,['class' => 'col-lg-4 control-label','title'=>'',]) !!}
    @if ($errors->has('anya_neve'))
    <div class="bevitel-error-szine">{{ $errors->first('anya_neve') }}</div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('anya_enarszam', 'Az anya enárszáma',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::text('anya_enarszam',$AllatokMarha->anya_enarszam,['class' => 'col-lg-4 control-label','title'=>'',]) !!}
    @if ($errors->has('anya_enarszam'))
    <div class="bevitel-error-szine">{{ $errors->first('anya_enarszam') }}</div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('jarlat_sorszam', 'Járlat sorszáma',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::text('jarlat_sorszam',$AllatokMarha->jarlat_sorszam,['class' => 'col-lg-4 control-label','title'=>'',]) !!}
    @if ($errors->has('jarlat_sorszam'))
    <div class="bevitel-error-szine">{{ $errors->first('jarlat_sorszam') }}</div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('jarlat_kiadasa', 'Járlat kiadás dátuma',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::date('jarlat_kiadasa',$AllatokMarha->jarlat_kiadasa,['class' => 'col-lg-4 control-label','title'=>'',]) !!}
      @if ($errors->has('jarlat_kiadasa'))
    <div class="bevitel-error-szine">{{ $errors->first('jarlat_kiadasa') }}</div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('szarmazas_tenyeszet', 'Származás tenyészet',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::text('szarmazas_tenyeszet',$AllatokMarha->szarmazas_tenyeszet,['class' => 'col-lg-4 control-label','title'=>'',]) !!}
    @if ($errors->has('szarmazas_tenyeszet'))
    <div class="bevitel-error-szine">{{ $errors->first('szarmazas_tenyeszet') }}</div>
    @endif
</div>

    <div class="bevitel-nyomogomb">
	<a href="{{ route('marha_display') }}" class='btn btn-info'>Cancel</a>
        {!! Form::submit('Elküld', ['class' => 'btn btn-info']) !!}
    </div>
    <br>
</div>
{!! Form::close() !!}
@endif
</div>