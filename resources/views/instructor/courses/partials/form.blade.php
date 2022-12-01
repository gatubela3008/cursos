<div class="mb-4">
    {!! Form::label('title', 'Título del curso') !!}
    {!! Form::text('title', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('title') ? ' border-red-600' : ''),
    ]) !!}
    @error('title')
        <strong class="text-xs text-red-600">
            {{ $message }}
        </strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso') !!}
    {!! Form::text('slug', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('slug') ? ' border-red-600' : ''),
        'readonly' => 'readonly',
    ]) !!}
    @error('slug')
        <strong class="text-xs text-red-600">
            {{ $message }}
        </strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtítulo del curso') !!}
    {!! Form::text('subtitle', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('subtitle') ? ' border-red-600' : ''),
    ]) !!}
    @error('subtitle')
        <strong class="text-xs text-red-600">
            {{ $message }}
        </strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripción del curso') !!}
    {!! Form::textarea('description', null, [
        'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('description') ? ' border-red-600' : ''),
    ]) !!}
    @error('description')
        <strong class="text-xs text-red-600">
            {{ $message }}
        </strong>
    @enderror
</div>

<div class="grid grid-cols-3 gap-6">
    <div class="">
        {!! Form::label('category_id', 'Categoría') !!}
        {!! Form::select('category_id', $categories, null, [
            'class' => 'form-input block w-full mt-1 rounded-lg cursor-pointer',
        ]) !!}
    </div>
    <div class="">
        {!! Form::label('level_id', 'Nivel') !!}
        {!! Form::select('level_id', $levels, null, [
            'class' => 'form-input block w-full mt-1 rounded-lg cursor-pointer',
        ]) !!}
    </div>
    <div class="">
        {!! Form::label('price_id', 'Precio') !!}
        {!! Form::select('price_id', $prices, null, [
            'class' => 'form-input block w-full mt-1 rounded-lg cursor-pointer',
        ]) !!}
    </div>
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">
    Imagen del curso
</h1>

<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" src="{{ Storage::url($course->image->url) }}" class="w-full h-64 object-cover object-center"
                alt="">
        @else
            <img id="picture" src="{{ asset('img/cursos/pexels-fauxels-3184357.jpg') }}"
                class="w-full h-64 object-cover object-center" alt="">
        @endisset

    </figure>

    <div class="">

        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet laudantium magnam reiciendis
            aut! Suscipit explicabo, voluptatibus cumque mollitia dolorem, nemo cum dolore facere
            facilis velit debitis officia sit! Aut, unde.</p>
        <br>

        {!! Form::label('file', 'Imagen a mostrar en el curso') !!}
        {!! Form::file('file', [
            'class' => 'form-control-file w-full form-input mt-2 rounded-lg' . ($errors->has('file') ? ' border-red-600' : ''),
            'accept' => 'image/*',
        ]) !!}
        @error('file')
            <strong class="text-xs text-red-600">
                {{ $message }}
            </strong>
        @enderror

    </div>
</div>
