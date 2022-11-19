<div class="form-group">
    {!! Form::label('name', 'Nombre: ') !!}
    {!! Form::text('name', null, [
        'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
        'placeholder' => 'Nombre del rol',
    ]) !!}
    @error('name')
        <span class="invalid-feedback">
            <strong>
                {{ $message }}
            </strong>
        </span>
    @enderror
</div>

<strong>Permisos</strong>
@error('permissions')
    <br>
    <span class="text-danger">
        <small>
            {{ $message }}
        </small>
    </span>
    <br>
@enderror
@foreach ($permissions as $permission)
    <div class="">
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, [
                'class' => 'mr-2',
            ]) !!}
            {{ $permission->name }}
        </label>
    </div>
@endforeach

