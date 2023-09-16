<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="form-group col-md-6">
                {{ Form::label('Nombre') }}
                {{ Form::text('name', $people->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('Apellido') }}
                {{ Form::text('lastname', $people->lastname, ['class' => 'form-control' . ($errors->has('lastname') ? ' is-invalid' : ''), 'placeholder' => 'Lastname']) }}
                {!! $errors->first('lastname', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                {{ Form::label('Correo') }}
                {{ Form::text('email', $people->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('Provincia') }}
                {{ Form::text('province', $people->province, ['class' => 'form-control' . ($errors->has('province') ? ' is-invalid' : ''), 'placeholder' => 'Province']) }}
                {!! $errors->first('province', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                {{ Form::label('Código Postal') }}
                {{ Form::text('zip_code', $people->zip_code, ['class' => 'form-control' . ($errors->has('zip_code') ? ' is-invalid' : ''), 'placeholder' => 'Zip Code']) }}
                {!! $errors->first('zip_code', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-9">
                {{ Form::label('Dirección') }}
                {{ Form::text('direction', $people->direction, ['class' => 'form-control' . ($errors->has('direction') ? ' is-invalid' : ''), 'placeholder' => 'Direction']) }}
                {!! $errors->first('direction', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                {{ Form::label('Sexo') }}
                {{ Form::text('sex', $people->sex, ['class' => 'form-control' . ($errors->has('sex') ? ' is-invalid' : ''), 'placeholder' => 'Sex']) }}
                {!! $errors->first('sex', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-3">
                {{ Form::label('Edad') }}
                {{ Form::text('age', $people->age, ['class' => 'form-control' . ($errors->has('age') ? ' is-invalid' : ''), 'placeholder' => 'Age']) }}
                {!! $errors->first('age', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-3">
                {{ Form::label('DNI') }}
                {{ Form::text('dni', $people->dni, ['class' => 'form-control' . ($errors->has('dni') ? ' is-invalid' : ''), 'placeholder' => 'Dni']) }}
                {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-3">
                {{ Form::label('Fecha de nacimiento') }}
                {{ Form::date('date_birth', $people->date_birth, ['class' => 'form-control' . ($errors->has('date_birth') ? ' is-invalid' : ''), 'placeholder' => 'Date Birth']) }}
                {!! $errors->first('date_birth', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
        <a class="btn btn-secondary" href="{{ route('people.index') }}"> {{ __('Cancelar') }}</a>
    </div>
</div>
