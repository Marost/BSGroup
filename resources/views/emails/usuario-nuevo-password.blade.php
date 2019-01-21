@component('mail::message')
# Hola {{ $request->nombres }}

Accesos para el Gestor de Contenido de {{ config('app.name') }}

__Email:__ {{ $request->email }} <br>
__Contraseña:__ {{ $request->password }}

@component('mail::button', ['url' => config('app.url').'/admin'])
Iniciar sesión
@endcomponent

Para cambiar tu contraseña, debes de ir la sección de Mi Perfil

@endcomponent
