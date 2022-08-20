@component('mail::message')
# Novo e-mail de tarefas.

Corpo da mensagem

- Opção 1

@component('mail::button', ['url' => ''])
Texto do Botão
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
