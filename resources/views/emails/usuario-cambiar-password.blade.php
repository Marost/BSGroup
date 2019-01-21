@component('mail::message')
El administrador del Gestor de Contenido de {{ config('app.name') }}, ha realizado el cambio de tu contraseña:

__Contraseña:__ {{ $request->password }}

@component('mail::button', ['url' => config('app.url').'/admin'])
	Iniciar sesión
@endcomponent

@endcomponent
