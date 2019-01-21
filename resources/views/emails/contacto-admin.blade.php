@component('mail::message')

__{{ $request->nombres }}__, te envio el siguiente mensaje:

@component('mail::panel')
	{{ $request->mensaje }}
@endcomponent

## Datos
- Email: __{{ $request->email }}__
- Celular: __{{ $request->celular }}__
- Necesito el Software para: __{{ $request->asunto }}__

@endcomponent