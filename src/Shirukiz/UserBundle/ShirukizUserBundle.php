<?php

namespace Shirukiz\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ShirukizUserBundle extends Bundle
{
    public function getParent()

  {

    return 'FOSUserBundle';

  }
}
