<!-- Quest information by Krotus to Otland.net--> 
                <div> 
                <table> 
                    <th colspan="2">Quest</th> 
                <?php 
                $storage=array('First Quest' => 50020, 'Second Quest' => 42355, 'Third Quest' => 52321); 
                foreach($storage as $name => $value) 
                { 
                    echo "<tr>"; 
                    echo "<td width=90%>".$name."</td>"; 
                    $quest = mysql_select_single("SELECT `value` FROM `player_storage` WHERE `key`='$value' AND `player_id`='$user_id' LIMIT 1;");  
                    if ($quest['value'] == 1) { 
                        echo "<td><img src='images/yes_quest.png'></td>"; 
                    }else{ 
                        echo "<td><img src='images/no_quest.png' ></td>"; 
                    } 
                    echo "</tr>"; 
                } 
                ?> 
                </table> 
                </div> 