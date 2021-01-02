<?php require_once('../scripts/cp/statusupdater.php'); ?>
<?php
mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$query_RSJokes = "SELECT *,rand() AS random_row FROM tbl_jokes ORDER BY ".random_row." LIMIT 33";
$RSJokes = mysql_query($query_RSJokes, $Wisdom_Mcr) or die(mysql_error());
$row_RSJokes = mysql_fetch_assoc($RSJokes);
$totalRows_RSJokes = mysql_num_rows($RSJokes);

$fanPages = array();
$fanPages[] = 'decor430lug@m.facebook.com'; //Alcohol - Because no good story started with someone eating a salad
$fanPages[] = 'dutch908realm@m.facebook.com'; //If everything is coming your way, you're probably a woman driving a car
$fanPages[] = 'bounty384hinged@m.facebook.com'; //The weatherlady: Proving that women can be fucking wrong
$fanPages[] = 'enlist920evoke@m.facebook.com'; //"Like" if you remember this gobby twat
$fanPages[] = 'placer941runt@m.facebook.com'; //Twins: Just remember, your parents didn't want one of you
$fanPages[] = 'bailer629murmur@m.facebook.com'; //"Like" if you remember these pink idiots
$fanPages[] = 'evolve704psyche@m.facebook.com'; //"Like" if you remember these space cadets
$fanPages[] = 'agenda132study@m.facebook.com'; //"Like" if you remember this crime fighting legend
$fanPages[] = 'ax151papuan@m.facebook.com'; //"Like" if you remember this crybaby
$fanPages[] = 'cloud669june@m.facebook.com'; //"Like" if you remember this evil bitch
$fanPages[] = 'dingy877salaam@m.facebook.com'; //"Like" if you remember this furry idiot
$fanPages[] = 'subtly650yapper@m.facebook.com'; //"Like" if you remember this hero
$fanPages[] = 'breach995ottawa@m.facebook.com'; //"Like" if you remember this Kung-Fu Dog
$fanPages[] = 'boring398veneer@m.facebook.com'; //"Like" if you remember this pink softarse
$fanPages[] = 'dolt63shmear@m.facebook.com'; //"Like" if you remember this wuss
$fanPages[] = 'corral333kiel@m.facebook.com'; //Angry Birds is a chick-flick
$fanPages[] = 'ritzy632rv@m.facebook.com'; //Being mistaken for Ronaldo every time you kick a football
$fanPages[] = 'corymb869ionia@m.facebook.com'; //Blow jobs are for dicks
$fanPages[] = 'scathe477smithy@m.facebook.com'; //Fisting is for pussies
$fanPages[] = 'hoax173verona@m.facebook.com'; //I'm busier than a cucumber in a woman's prison
$fanPages[] = 'asyut143regent@m.facebook.com'; //Not Being Totally Sure If Your Even 1% Right In The Head Or Not
$fanPages[] = 'jock674store@m.facebook.com'; //Resisting the urge to correct everyone's status spelling mistakes
$fanPages[] = 'box900must@m.facebook.com'; //Somebody called me a rich cunt today, I nearly dropped my can of petrol
$fanPages[] = 'basics695plaza@m.facebook.com'; //Swimming is not a sport, it's something you do to avoid drowning
$fanPages[] = 'ic842kudzu@m.facebook.com'; //Virgins are tight cunts
$fanPages[] = 'backer601coma@m.facebook.com'; //Your mum is so dirty even Cillit wouldn't bang her
$fanPages[] = 'intro588warmly@m.facebook.com'; //Biting the hand that feeds you because you're a vicious cunt
$fanPages[] = 'linden300wok@m.facebook.com'; //Giggling like an idiot to yourself because your stoned
$fanPages[] = 'ante102hal@m.facebook.com'; //I'm not saying ur ugly, but u should have ur own flavour of monster munch
$fanPages[] = 'barely969shiny@m.facebook.com'; //I entered cunt into my Sat Nav, it took me to you
$fanPages[] = 'entree256sulfa@m.facebook.com'; //Letting your finger rest after a hard day of "Liking" random shit
$fanPages[] = 'robber971teensy@m.facebook.com'; //Looking for cameltoe every time you see a woman in leggings
$fanPages[] = 'duck635endue@m.facebook.com'; //Nothing says "I trust you," quite like saying "Yes" to anal
//$fanPages[] = ''; //

$i=0;
do { 
  $to = $fanPages[$i];
  $subject = $row_RSJokes["tbl_content"];
  $message = "";
  $headers =  "From: autoupdater@likemyfanpage.com \r\n";
  mail($to,$subject,$message,$headers);
  //echo $fanPages[$i].":".$row_RSJokes["tbl_content"]."<br>";
  $i++; 
} while ($row_RSJokes = mysql_fetch_assoc($RSJokes)); 

echo "Jokes Sent...";
mysql_free_result($RSJokes);
?>