<?php

namespace IMIE\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class IMIEUserBundle extends Bundle
{
	public function getParent()
  	{
    	return 'FOSUserBundle';
  	}
}
