
<div class="bevitel-dialog">

@if(!empty($AllatokMarha))    

{!!Form::open(array('route' => array('kikerules_marha_update',$AllatokMarha,$AllatokMarha->id)))!!}
  {{ csrf_field() }}
 {{ method_field('PUT') }}
 <div class="bevitel-fejlec">{{ __('Marha kikerülés módosítás') }}</div>

<div class="bevitel-body"><br>
<div class="form-group">
	
    {{ Form::model($AllatokMarha, array('route' => array('kikerules_marha_update',$AllatokMarha,$AllatokMarha->id, 'method' => 'UPDATE'))) }}
 
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
    {!! Form::label('kikerules', 'Kikerült',['class' => 'col-lg-5 control-label']) !!}
    {!! Form::select('kikerules',['true' => 'Kikerült','false' => 'Tenyészetben van'],'true',['class' => 'col-lg-4 control-label']) !!}
      @if ($errors->has('neme'))
    <div class="bevitel-error-szine">{{ $errors->first('neme') }}</div>
@endif
</div>

      <div class="form-group">
    {!! Form::label('kikerules_datuma', 'Kikerülés dátuma',['class' => 'col-lg-5 control-label','id'=>'label_kikerules_datuma',]) !!}
    {!! Form::date('kikerules_datuma',$AllatokMarha->bekerult ,['class' => 'col-lg-4 control-label','id'=>'date_kikerules_datuma',]) !!}
      @if ($errors->has('kikerules_datuma'))
        <div class="bevitel-error-szine">
            {{ $errors->first('kikerules_datuma') }}
        </div>
    @endif
    </div>
    <div class="form-group">
        {!! Form::label('kikerules_helye', 'Kikerülés helye',['class' => 'col-lg-5 control-label','id'=>'label_kikerules_helye',]) !!}
        {!! Form::text('kikerules_helye', $kikerulesi_helyek[0] ,['class' => 'col-lg-4 control-label','id'=>'text_kikerules_helye',]) !!}
        @if ($errors->has('kikerules_helye'))
            <div class="bevitel-error-szine">
                {{ $errors->first('kikerules_helye') }}
            </div>
        @endif
     </div>   
      <div class="form-group">
        {!! Form::label('', 'Eddigi kikerülési helyek',['class' => 'col-lg-5 control-label','id'=>'label_kikerules_helye',]) !!}
        {!! Form::select('valami', $kikerulesi_helyek , 'default', array('class' => 'col-lg-4 control-label','id'=>'select_eddigi_kikerulesi_helyek','onchange'=>'set_kikerules_helyek()',)) !!}
      
     </div>   
   <div class="form-group">
        {!! Form::label('cel_tenyeszet', 'Céltenyészet',['class' => 'col-lg-5 control-label','id'=>'label_celtenyeszet',]) !!}
        {!! Form::text('cel_tenyeszet', null ,['class' => 'col-lg-4 control-label','id'=>'text_celtenyeszet',]) !!}
        @if ($errors->has('cel_tenyeszet'))
            <div class="bevitel-error-szine">
                {{ $errors->first('cel_tenyeszet') }}
            </div>
        @endif
     </div>   

<!--A checkbox truera van alliva van allitva-->
<!-- Eddig ha a kikerules checkbox true-------------------------->
<!--  Elhullas----------------------------------------------------->



    <div class="bevitel-nyomogomb">
	<a href="{{ route('kikerult_marha') }}" class='btn btn-info'>Cancel</a>
        {!! Form::submit('Elküld', ['class' => 'btn btn-info']) !!}
    </div>
    <br>
</div>
{!! Form::close() !!}
@endif
</div>