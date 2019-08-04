
<div class="bevitel-dialog">

@if(!empty($AllatokMarha))    

{!!Form::open(array('route' => array('sajat_vagas_marha_update',$AllatokMarha,$AllatokMarha->id)))!!}
  {{ csrf_field() }}
 {{ method_field('PUT') }}
 <div class="bevitel-fejlec">{{ __('Marha saját vágás módosítása') }}</div>

<div class="bevitel-body"><br>
<div class="form-group">
	
    {{ Form::model($AllatokMarha, array('route' => array('sajat_vagas_marha_update',$AllatokMarha,$AllatokMarha->id, 'method' => 'UPDATE'))) }}
 
    {!! Form::label('enarszam', 'Enarszám',['class' => 'col-lg-5 control-label'])!!}
    {!!Form::text('enarszam',null,['class' => 'col-lg-4 control-label','readonly','title'=>'Ezt most nem változtathatod ha nem jó töröld le az egész adatot!',]) !!}
  @if ($errors->has('enarszam'))
    <div class="bevitel-error-szine">{{ $errors->first('enarszam') }}</div>
@endif
</div>

<div class="form-group">
    {!! Form::label('neve', 'Az állat neve',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::text('neve', null,['class' => 'col-lg-4 control-label','readonly']) !!}
    @if ($errors->has('neve'))
    <div class="bevitel-error-szine">{{ $errors->first('neve') }}</div>
@endif
</div>
<div class="form-group">
    {!! Form::label('neme', 'Az állat neme',['class' => 'col-lg-5 control-label']) !!}
	{!! Form::select('neme',['noivaru' => 'Nőivaru','himivaru' => 'Hímivaru'],'noivaru',['class' => 'col-lg-4 control-label','disabled']) !!}
      @if ($errors->has('neme'))
    <div class="bevitel-error-szine">{{ $errors->first('neme') }}</div>
@endif
</div>

<div class="form-group">
    {!! Form::label('szuletes_datuma', 'Születés dátuma',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::date('szuletes_datuma',null ,['class' => 'col-lg-4 control-label','readonly']) !!}
      @if ($errors->has('szuletes_datuma'))
    <div class="bevitel-error-szine">{{ $errors->first('szuletes_datuma') }}</div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('bekerult', 'Bekerült',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::date('bekerult',null ,['class' => 'col-lg-4 control-label','readonly']) !!}
    @if ($errors->has('bekerult'))
    <div class="bevitel-error-szine">{{ $errors->first('bekerult') }}</div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('sajat_vagas', 'Saját vágás',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::select('sajat_vagas',['true' => 'Saját vágás','false' => 'Tenyészetben van'],'true',['class' => 'col-lg-4 control-label']) !!}
      @if ($errors->has('sajat_vagas'))
    <div class="bevitel-error-szine">{{ $errors->first('sajat_vagas') }}</div>
@endif
</div>

      <div class="form-group">
    {!! Form::label('sajat_vagas_datuma', 'Saját vágás dátuma',['class' => 'col-lg-5 control-label','id'=>'label_sajat_vagas_datuma',]) !!}
    {!! Form::date('sajat_vagas_datuma',$AllatokMarha->bekerult ,['class' => 'col-lg-4 control-label','id'=>'date_sajat_vagas_datuma',]) !!}
      @if ($errors->has('sajat_vagas_datuma'))
        <div class="bevitel-error-szine">
            {{ $errors->first('sajat_vagas_datuma') }}
        </div>
    @endif
    </div>
 
<!--A checkbox truera van alliva van allitva-->
<!-- Eddig ha a kikerules checkbox true-------------------------->
<!--  Elhullas----------------------------------------------------->



    <div class="bevitel-nyomogomb">
	<a href="{{ route('home') }}" class='btn btn-info'>Cancel</a>
        {!! Form::submit('Elküld', ['class' => 'btn btn-info']) !!}
    </div>
    <br>
</div>
{!! Form::close() !!}
@endif
</div>