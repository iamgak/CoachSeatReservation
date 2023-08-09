<?php
ini_set('memory_limit', '1024M');
class Reservation {
    private $totalSeats = 80;
    private $totalRows = 13;
    private $SeatsPerRow = 7;
    private $SeatsPerLastRow = 3;
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'root', '', 'reservation');
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);

        }
    }

    public function displayMessages() {
        $query = "SELECT block, seat FROM seating";
        $result = $this->db->query($query);

        while ($row = $result->fetch_assoc()) {

            $seats[] = $row['seat'];
            $block[] = $row['block'];
        }

            for ($i = 0; $i < 11; $i++) {
                $Crow = ($i == 11) ? 3:7 ;

                for ($j = 0; $j < $Crow; $j++) {
                    if ($j < $seats[$i]) {
                        $status = 'X';
                    } else {
                        $status = '_';
                    }
                    echo $status;
                }echo "<br>"; // Separate rows
            }

            
        
    }

    public function sum(){
    	$query = "SELECT SUM(seat) AS total_seats FROM seating";
        $result = $this->db->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            $totalReservedSeats = $row['total_seats'];
            if($totalReservedSeats<=80){

				return $totalReservedSeats;
            }
            return 0;
            
    }
}
public function check($input){
	$result=$this->db->query("SELECT seat AS min_seats, block FROM seating order by seat limit 1");

	$row = $result->fetch_assoc();
	$tmin=$row['min_seats'];

	$block=$row['block'];
	echo "min_seat in check()".$tmin."--".$block."<br>";
	return array($block, $tmin);
	}

public function reserveSeats($input) {
            $second=$input;
            while($second > 0){
            	$var1=$this->check($second);
                $minToAdd = min($second, 7-$var1[1]);

                if($minToAdd==0){
                	break;
                }
                echo "minimum value".$var1[1]."----".$minToAdd."<br>";
                $updateQuery = "UPDATE seating SET seat = seat + $minToAdd WHERE block = $var1[0] limit 1";
                $this->db->query($updateQuery);

                $second -= $minToAdd;
                
            
        

            }
        }
    }

    
    
    


$book= new Reservation();
$i=5;
if($i<=$book->sum()){
$book->reserveSeats($i);


}
echo 'hasle';
//$book->reserveSeats(1);
$book->displayMessages();
?>