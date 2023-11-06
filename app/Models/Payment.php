<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Xendit\Xendit;

class Payment extends Model
{
    public function __construct()  {
        Xendit::setApiKey("xnd_development_RlAT64Xtfn928omjom12v2oL6FHtDSPEu4xdkRcKEDnlKCDy4PVjNng5kCg4u");
    }
}
