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

      //If point opponnent > point my => FOE
      if($this->result->getLastScoreFor($this->opponentSide) > $this->result->getLastScoreFor($this->mySide))
        return parent::foeChoice();

      //If opponent lastChoice is friend => FRIEND
      if (!$this->result->getLastChoiceFor($this->opponentSide))
        return parent::friendChoice();

      return parent::foeChoice();
    }

};
