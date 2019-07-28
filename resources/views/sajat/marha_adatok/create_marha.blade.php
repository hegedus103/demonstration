
<div class="bevitel-dialog">
{!!Form::open(array('route' => 'marha_torzs_create'))!!}
  {{ csrf_field() }}
 <div class="bevitel-fejlec">{{ __('Marha törzsadat bevitel') }}</div>

<div class="bevitel-body"><br>
<div class="form-group">
	
    {!! Form::label('enarszam', 'Enarszám',['class' => 'col-lg-5 control-label'])!!}
    {!!Form::text('enarszam', null,['class' => 'col-lg-4 control-label']) !!}
  @if ($errors->has('enarszam'))
    <div class="bevitel-error-szine">{{ $errors->first('enarszam') }}</div>
@endif
</div>

<div class="form-group">
    {!! Form::label('neve', 'Az állat neve',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::text('neve', null ,['class' => 'col-lg-4 control-label']) !!}
    @if ($errors->has('neve'))
    <div class="bevitel-error-szine">{{ $errors->first('neve') }}</div>
@endif
</div>
<div class="form-group">
    {!! Form::label('neme', 'Az állat neme',['class' => 'col-lg-5 control-label']) !!}
	{!! Form::select('neme',['noivaru' => 'Nőivaru','himivaru' => 'Hímivaru'],'noivaru',['class' => 'col-lg-4 control-label']) !!}
      @if ($errors->has('neme'))
    <div class="bevitel-error-szine">{{ $errors->first('neme') }}</div>
@endif
</div>

<div class="form-group">
    {!! Form::label('fajta', 'Fajta',['class' => 'col-lg-5 control-label']) !!}
	{!! Form::select('fajta',['magyartarka' => 'Magyartarka','limousin' => 'Limousine','lapaly' => 'Lapály marha','feher_kek' => 'Fehér-kék belga','hereford' => 'Hereford','hersey' => 'Hersey','magyarszurke' => 'Magyar Szürke','egyebbhushasznu' => 'Egyébb húshasznú'],'magyartarka',['class' => 'col-lg-4 control-label', 'readonly' => 'true',]) !!}
  @if ($errors->has('fajta'))
    <div class="bevitel-error-szine">{{ $errors->first('fajta') }}</div>
@endif
</div>
<div class="form-group">
    {!! Form::label('szine', 'Színe',['class' => 'col-lg-5 control-label']) !!}
	{!! Form::select('szine',['vorostarka' => 'Vöröstarka','feketetarka' => 'Fekete-tarka','zsemletarka' => 'Zsemletarka','fekete' => 'Egyszínű fekete','voros' => 'Egyszínű vörös','feketevoros' => 'Fekete-vörös','egyebbtarka' => 'Egyébb-tarka','egyebb' => 'Egyszínű-egyébb'],'magyartarka',['class' => 'col-lg-4 control-label']) !!}
      @if ($errors->has('szine'))
    <div class="bevitel-error-szine">{{ $errors->first('szine') }}</div>
@endif
</div>
<div class="form-group">
    {!! Form::label('szuletes_datuma', 'Születés dátuma',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::date('szuletes_datuma',null ,['class' => 'col-lg-4 control-label']) !!}
      @if ($errors->has('szuletes_datuma'))
    <div class="bevitel-error-szine">{{ $errors->first('szuletes_datuma') }}</div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('bekerult', 'Bekerült',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::date('bekerult',null ,['class' => 'col-lg-4 control-label']) !!}
    @if ($errors->has('bekerult'))
    <div class="bevitel-error-szine">{{ $errors->first('bekerult') }}</div>
    @endif
</div>
<div class="form-group">
	
    {!! Form::label('anya_enarszam', 'Anya Enarszám',['class' => 'col-lg-5 control-label'])!!}
    {!!Form::text('anya_enarszam', null,['class' => 'col-lg-4 control-label']) !!}
    @if ($errors->has('anya_enarszam'))
    <div class="bevitel-error-szine">{{ $errors->first('anya_enarszam') }}</div>
    @endif    
</div>
<div class="form-group">
    {!! Form::label('anya_neve', 'Anya neve',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::text('anya_neve', null ,['class' => 'col-lg-4 control-label']) !!}
 @if ($errors->has('anya_neve'))
    <div class="bevitel-error-szine">{{ $errors->first('anya_neve') }}</div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('jarlat_sorszam', 'Járlat sorszáma',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::number('jarlat_sorszam', null ,['class' => 'col-lg-4 control-label']) !!}
     @if ($errors->has('jarlat_sorszam'))
    <div class="bevitel-error-szine">{{ $errors->first('jarlat_sorszam') }}</div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('jarlat_kiadasa', 'Járlat kiadása',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::date('jarlat_kiadasa',null ,['class' => 'col-lg-4 control-label']) !!}
      @if ($errors->has('jarlat_kiadasa'))
    <div class="bevitel-error-szine">{{ $errors->first('jarlat_kiadasa') }}</div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('szarmazas_tenyeszet', 'Származás tenyészet',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::text('szarmazas_tenyeszet', $tenyeszetkod ,['class' => 'col-lg-4 control-label']) !!}
     @if ($errors->has('szarmazas_tenyeszet'))
    <div class="bevitel-error-szine">{{ $errors->first('szarmazas_tenyeszet') }}</div>
    @endif
</div>

<div class="bevitel-nyomogomb">
	<a href="{{ route('home') }}" class='btn btn-info'>Cancel</a>
        {!! Form::submit('Elküld', ['class' => 'btn btn-info']) !!}
</div>
<br>
</div>
{!! Form::close() !!}
</div>