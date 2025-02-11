<?php

namespace App;

enum UserRoleEnum: string
{
    case SUPER_ADMIN = 'super-admin';
    case ADMIN = 'admin';
}
