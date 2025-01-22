<?php

namespace App\Enum;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case MODO = 'modo';
    case MEMBER = 'member';
}
