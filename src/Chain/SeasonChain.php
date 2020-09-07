<?php


namespace App\Chain;


class SeasonChain extends AbstractHandler
{
    public function getSeason($user){
        $summer = 0;
        $winter = 0;
        $spring = 0;
        $autumn = 0;

        $travels = $user->getTransactions()->getValues();

        foreach ($travels as $travel){
            $month = (int)$travel->getTicketDate()->format('m');

            if ($month>=3  && $month<=5){
                $spring++;
            }
            elseif ($month>=6  && $month<=8) {
                $summer++;
            }
            elseif ($month>=9  && $month<=11) {
                $autumn++;
            }
            else {
                $winter++;
            }
        }
        $maxFlight = max([$autumn,$winter,$summer,$spring]);
        $result = array();

        if($summer == $maxFlight){
            $result[] = 'summer';
        }if($spring == $maxFlight){
            $result[] = 'spring';
        }if($autumn == $maxFlight){
            $result[] = 'autumn';
        }if($winter == $maxFlight){
            $result[] = 'winter';
        }

        return $result;
    }
    public function handle(array $result)
    {
        $result['season'] = $this->getSeason($result['user']);
        return parent::handle($result);
    }
}