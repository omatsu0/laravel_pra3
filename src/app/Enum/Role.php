<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

class Role extends Enum
{
    const ADMIN = 1;
    const AUTHORIZER = 2;
    const APPLICANT = 3;
    
    public function getLabel() {
      return __('my_app.'.strtolower($this->getKey()));
  }
}
