<?php
/**
 *
 */

namespace Session;

use Mvc5\Config\Configuration;

interface Session
    extends Configuration
{
    /**
     * @param bool|true $cookie
     */
    function destroy($cookie = true);
}
