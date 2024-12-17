<?php
#main function
function GA($penyewa,$waktu,$jumlah_individu, $laju_mutasi, $iterasi){
  $isLooping = true;
  sleep(1);
 
  //buat 10 individu
  for ($x = 0; $x < $jumlah_individu; $x++) {
    $individu[] = buat_individu($penyewa, $waktu); #buat individu dari penyewa dan waktu
  } 

  while($isLooping == true) {
    //hitung loop
    $iterasi++;

    //hitung nilai_fitness setiap individu
    for($i=0;$i < $jumlah_individu; $i++){
      $individu[$i]["nilai_fitness"] = hitung_nilai_fitness($individu[$i]);
    }

    // echo '<pre>';var_dump($individu);die();

    //susun nilai_fitness tertinggi
    $columns = array_column($individu, 'nilai_fitness');
    array_multisort($columns, SORT_DESC, $individu);

    //tampilkan fitness tertinggi
    // echo "Fitness Tertinggi (generasi ke-".$n_generasi."): ".$individu[0]["nilai_fitness"]."<br/>";
    if($individu[0]["nilai_fitness"] >= 1){$isLooping = false; break;} #jika fitness tertinggi >= 1 -> hentikan loop

    //cross over one-point (dua individu terbaik)
    list($child1,$child2) = crossover($individu[0], $individu[1]);

    //mutasi
    list($mutant1,$mutant2) = mutation($child1, $child2, $laju_mutasi);

    //regenerasi
    $children = array($mutant1,$mutant2);
    $individu = regeneration($children, $individu);
  }

  return array($individu[0], $iterasi);
}

function buat_individu($penyewa, $waktu){
  for ($i = 0; $i < count($penyewa); $i++) {
    $kromosom_penyewa[] = rand(1,count($penyewa));
    $kromosom_waktu[] = rand(1,count($penyewa));
  }

  $individu["kromosom_penyewa"] = $kromosom_penyewa;
  $individu["kromosom_waktu"] = $kromosom_waktu;

  return $individu;
}

#hitung nilai fitness
function hitung_nilai_fitness($individu){
  $tumbukan_penyewa = 0;
  $maps = array_count_values($individu["kromosom_penyewa"]);
  foreach ($maps as $map) {
    if($map >1){
      $tumbukan_penyewa += $map;
    }
  }
  
  $maps = array_count_values($individu["kromosom_waktu"]);
  foreach ($maps as $map) {
    if($map >1){
      $tumbukan_penyewa += $map;
    }
  }
  
  #echo "Tumbukan Pertandingn = ".$tumbukan_penyewa;
  $nilai_fitness = 1/(1+$tumbukan_penyewa);

  return $nilai_fitness;
}

#fungsi crossover
function crossover($parent1, $parent2){
  $child1 = $parent1;
  $child2 = $parent2;
  
  $CP = rand(1,count($child1["kromosom_penyewa"]));
  
  $bag1 = array_slice($child1["kromosom_penyewa"], 0, $CP);
  $bag2 = array_slice($child1["kromosom_penyewa"], $CP);
  
  $bag3 = array_slice($child2["kromosom_penyewa"], 0, $CP);
  $bag4 = array_slice($child2["kromosom_penyewa"], $CP);
  
  $child1["kromosom_penyewa"] = array_merge($bag1, $bag4);
  $child2["kromosom_penyewa"] = array_merge($bag2, $bag3);
  
  $bag1 = array_slice($child1["kromosom_waktu"], 0, $CP);
  $bag2 = array_slice($child1["kromosom_waktu"], $CP);
  $bag3 = array_slice($child2["kromosom_waktu"], 0, $CP);
  $bag4 = array_slice($child2["kromosom_waktu"], $CP);
  
  $child1["kromosom_waktu"] = array_merge($bag1, $bag4);
  $child2["kromosom_waktu"] = array_merge($bag2, $bag3);
  
  $child1["nilai_fitness"] = hitung_nilai_fitness($child1);
  $child2["nilai_fitness"] = hitung_nilai_fitness($child2);
  
  // echo "C1 = "; var_dump($child1);
  // echo "C2 = "; var_dump($child2);
  // echo "<hr/>"; die();
  
  return array($child1, $child2);
}

#fungsi mutasi
function mutation($child1, $child2, $laju_mutasi){

  // mutasi child
  for ($i = 0; $i < count($child1["kromosom_penyewa"]); $i++) {
    $randomFloat = rand(0, 10) / 10;
    
    // mutasi penyewa
    if($randomFloat <= $laju_mutasi){
      $mutant1["kromosom_penyewa"][] = rand(1,count($child1["kromosom_penyewa"]));
      $mutant2["kromosom_penyewa"][] = rand(1,count($child2["kromosom_penyewa"]));
    }else{
      $mutant1["kromosom_penyewa"][] = $child1["kromosom_penyewa"][$i];
      $mutant2["kromosom_penyewa"][] = $child2["kromosom_penyewa"][$i];
    }
    
    // mutasi waktu
    if($randomFloat <= $laju_mutasi){
      $mutant1["kromosom_waktu"][] = rand(1,count($child1["kromosom_waktu"]));
      $mutant2["kromosom_waktu"][] = rand(1,count($child2["kromosom_waktu"]));
    }else{
      $mutant1["kromosom_waktu"][] = $child1["kromosom_waktu"][$i];
      $mutant2["kromosom_waktu"][] = $child2["kromosom_waktu"][$i];
    }
    
  }
  
  $mutant1["nilai_fitness"] = hitung_nilai_fitness($mutant1);
  $mutant2["nilai_fitness"] = hitung_nilai_fitness($mutant2);
  
  // echo "M1 = "; var_dump($mutant1);
  // echo "M2 = "; var_dump($mutant2);

  return array($mutant1, $mutant2);
}

#Fungsi regeneration
function regeneration($children, $individu){
  //hapuskan dua nilai individu terendah
  array_pop($individu);
  array_pop($individu);

  return array_merge($children,$individu);
}
?>