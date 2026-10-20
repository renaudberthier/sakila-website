<?php

namespace App\Enum;

enum Rating: string {
    case G = 'G';
    case PG = 'PG';
    case PG13 = 'PG-13';
    case R = 'R';
    case NC17 = 'NC-17';
}