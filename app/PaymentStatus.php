<?php

namespace App;

enum PaymentStatus: string
{
    case PENDING = 'pending';
    case PAID = 'paid';
}
