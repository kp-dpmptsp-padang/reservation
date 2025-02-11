<?php

namespace App;

enum AttachmentTypeEnum: string
{
    case IMAGE = 'image';
    case DOCUMENT = 'document';
    case OTHER = 'other';
}
