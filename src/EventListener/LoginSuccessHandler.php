<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;

class LoginSuccessHandler
{
    public function __invoke(AuthenticationSuccessEvent $event): void
    {
        // Obtener los datos actuales de la respuesta
        $data = $event->getData();

        // Obtener el usuario autenticado
        $user = $event->getUser();

        if ($user) {
            // Agregar el nombre del usuario y su rol
            $data['name'] = $user->getName();
            $data['role'] = $user->getRoles();

        }

        // Establecer los datos actualizados
        $event->setData($data);
    }

}