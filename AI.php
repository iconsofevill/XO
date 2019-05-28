<?php
include_once "Tic_Tac_Toe_Para.php";

class AI extends Tic_Tac_Toe
{

    function show()
    {
        echo "\t\n<table>";
        foreach ($this->array as $i => $v) {
            echo "\t\n<tr>";
            foreach ($v as $j => $val) {
                if ($val == 'X' || $val == 'O') {
                    echo "\t<td>$val</td>";
                } else {
                    echo "\t<td><a href='?i=$i&j=$j'>?</a></td>";
                }
            }
            echo '</tr>';
        }
        echo '</table><hr>';
    }

    function random_move($i, $j, $play)
    {
        if ($this->there_are_empty_cells()) {
            $player = $play == 'X' ? 'cross' : 'circle';

            // switch ($player == 'cross') {
            //     case 'cross':
            //         $this->put_cross($i, $j);
            //         break;

            //     case 'circle':
            //         $this->put_circle($i, $j);
            //         break;

            //     default:
            //         // $this->turn_move();
            //         break;
            // }
            if ($this->in_matrix($i, $j) && $this->is_empty($i, $j) && $this->check_move($player)) {
                $this->array[$i][$j] = $play;
                $this->turn_move();
                return true;
            } else {
                return false;
            } 
        } 
        else {
            return false;
        } 


    }

    function random_put_cross()
    {
        do { } while (!$this->random_move($this->random(), $this->random(), 'X'));
    }

    function random_put_circle()
    {
        do { } while (!$this->random_move($this->random(), $this->random(), 'O'));
    }

    function random()
    {
        return random_int(0, $this->get_size() - 1);
    }

    function there_are_empty_cells()
    {
        $count = 0;
        foreach ($this->array as $value) {
            foreach ($value as $val) {
                if ($val == '') {
                    $count++;
                }
            }
        }
        return $count;
    }
}
