<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Auth\DefaultPasswordHasher;

class HashPasswordShell extends Shell
{
    public function main($clearPassword = null)
    {
//        $clearPassword = "teacher";
        if(!is_null($clearPassword))
        {
            $password = (new DefaultPasswordHasher)->hash($clearPassword);
          $this->out($password);
        }
        else
        {
            $this->out("You must invoke with a parameter");
        }
    }

    public function check($clearPassword = null, $hashPassword = null )
    {
        if(!is_null($clearPassword) && !is_null($hashPassword) )
        {
            $this->out($hashPassword);

            if((new DefaultPasswordHasher)->check($clearPassword, $hashPassword))
            {
                $this->out("Password and hash match");
            }
            else
            {
               $this->out('Password and hash not match');
               $this->out('Remember bash also use $ for variables');
            }
        }
        else
        {
            $this->out("You must invoke with a parameter");
        }
    }
}
?>
