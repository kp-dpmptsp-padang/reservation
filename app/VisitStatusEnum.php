<?php

namespace App;

enum VisitStatusEnum: string
{
    case PENDING = 'menunggu';
    case VERIFIED = 'terverifikasi';
    case ONGOING = 'sedang-berlangsung';
    case COMPLETED = 'selesai';
    case CANCELLED = 'batal';
}
