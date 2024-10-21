<?php

return [
    'required'      => 'Este campo é obrigatório.',
    'string'        => 'Este campo deve ser uma palavra e/ou frase.',
    'email'         => 'Este campo deve ser um endereço de e-mail válido.',
    'unique'        => 'O :attribute já está em uso.',
    'integer'       => 'Este campo deve ser um número inteiro.',
    'confirmed'     => 'A confirmação desse campo não corresponde.',
    'failed'        => 'Essas credenciais não correspondem aos nossos registros.',
    'throttle'      => 'Muitas tentativas de login. Por favor, tente novamente em :seconds segundos.',
    'min'           => [
        'string'    => 'Este campo deve ter pelo menos :min caracteres.',
    ],
    'max'           => [
        'string'    => 'Este campo não pode ter mais que :max caracteres.',
    ],

    'email_required' => 'O campo e-mail é obrigatório.',
    'email_invalid' => 'O campo e-mail deve ser um endereço de e-mail válido.',
    'email_not_found' => 'Este e-mail não está registrado.',
    'reset_link_sent' => 'Nós enviamos um link para seu e-mail.',
    'reset_link_failed' => 'Erro ao gerar o link de recuperação de senha.',
];
