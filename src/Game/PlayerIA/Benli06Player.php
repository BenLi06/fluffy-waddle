<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class LovePlayer
 * @package Hackathon\PlayerIA
 * @author Lea Benamozig
 */
class Benli06Player extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    
    public function getChoice()
    {
      //$this->prettyDisplay();

      $dream_team = array('PacoTheGreat', 'Felixdupriez', 'Shiinsekai', 'Ghope', 'Etienneelg', 'Christaupher', 'Galtar95');
      $oppName = $this->result->getStatsFor($this->opponentSide)['name'];
      if (in_array($oppName, $dream_team))
        return parent::friendChoice();

      $statsFriend = $this->result->getStatsFor($this->opponentSide)['friend'];
      $statsFoe = $this->result->getStatsFor($this->opponentSide)['foe'];

      //If point opponnent > point my => FOE
      if($this->result->getLastScoreFor($this->opponentSide) > $this->result->getLastScoreFor($this->mySide))
        return parent::foeChoice();

      //If opponent lastChoice is friend => FRIEND
     // if (!$this->result->getLastChoiceFor($this->opponentSide))
      if (count($statsFriend) > count($statsFoe))
        return parent::friendChoice();

      return parent::foeChoice();
    }

};
