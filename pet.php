<!--
----- Get the main account to base stats for QPC
----- Get the main account to base 90s for combat stats
----- Slayer Task Point Skip to unlock everything
----- Write a script to generate Pet Task
----- This task will include:
-------- If Combat-Boss Task: # of kills at Boss
-------- If Non-Combat Boss: # Of Completions
-------- If Slayer Boss Task: # Of Tasks (1-3 tasks only)
-------- If Skilling Pet: XP or Hours spent on Pet
-------- If Bloodhound: Attempt 5 Master Clues per roll
-------- If MiniGame Pet: Determine # Of Games / Rolls (ex 5 BA gambles)
----------- If BA: Get Elite Kandarian Diary to complete first "Pet" Task
-------- If Compy Chick: Get stats for Elite Diary + Chompy Kills :)
-----
----- Once Pet Achieved:
-------- A) Sell bank -- Platinum Tokens
-------- B) Sell bank -- Spend money on Buyable Skills
-------- C) Sell bank -- Upgrade FashionScape
----------- FashionScape Goals: 
-------------- 3rd Age gear
-------------- Crystal Crown 
-------------- Crystal Goblet
-------- D) No Bank Sell 
-------- E) Turn Platinum Tokens into GP for free use

----- General Rules
-------- If hunting a slayer boss task say, cerb and you get gargoyles, you can not kill gargleon boss
-------- Jad or Inferno is 2 attempts per roll
-------- Gear Upgrades are not restricted, do with the GP as you please
-------- Gear will be liquidated if require for split from iron
-------- Solo only :)
-->


<?php 
    $pet = generate_pet();
    echo "Pet below...";
    echo $pet;
?>

<html>
    <head>
        <title> Generate Pet </title>
    </head>
    <body>
        <div align='center'>
            <h1> Generate Pet! </h1>
        </div>
        <form method="post" action="<?echo generate_pet()?>">
            <input type="submit" name="submit" value="Generate">
            
        </form>
    </body>
</html>



<?php

    function generate_pet() {
        # Select Skilling, Combat, Non-Combat or Minigame Pet
        $type_pet = select_pet_type();

        # Select the time spent on pet, need to know type pet to determine the length of pet grind
        $time = choose_interval($type_pet);

        # Select the pet itself
        $pet = choose_pet($type_pet);
        
        return $pet;
    }

    function select_pet_type(){
        $activity = array("Skilling", "Combat", "NonCombat", "Slayer", "Minigame", "Bloodhound", "Chompy")

        $type = array_rand($activiy, 1);

        return $type
    }

    function choose_interval($type_pet) {
        if(str_contains($type_pet, "Skilling")) {
            # Select # of Hours
            $kc = random_int(5, 20);
        } else if (str_contains($type_pet, "Combat")){
            # Select boss kc between 10-50
            $kc = random_int(10, 50);
        } else if (str_contains($type_pet, "NonCombat")){
            # Select boss kc between 10-50
            $kc = random_int(10, 50);
        } else if (str_contains($type_pet, "Slayer")){
            # Select number of tasks: 1-3
            $kc = random_int(1, 3);
        } else if (str_contains($type_pet, "Minigame")){
            # Select number of reward rolls
            $kc = random_int(5, 15);
        } else if (str_contains($type_pet, "Bloodhound")){
            $kc = 5;
        } else if (str_contains($type_pet, "Chompy")){
            $kc = 200;
        }
        return $kc;
    }

    function choose_pet($type_pet) {
        $skilling = array("Heron", "Chinchompa", "Rocky", "Tangleroot", "Golem", "Squirrel", "Runecrafting", "Beaver");
        $combat = array("Zulrah", "Mole", "Corporeal Beast", "Vorkath", "ToB", "CoX", "Nightmare", "Vet'ion", "Callisto", "Venneitis", "Scorpia", "Chaos Elemental", "King Black Dragon", "Sarachnis", "Skotizo", "Kril", "Graardor", "Zilyana", "Kree", "Gauntlet");
        $noncombat = array("Phoenix", "Tiny Tempor", "Zalcano", "Herbiboar");
        $slayer = array("Kraken", "Cerberus", "Gargoyle", "Thermy", "Sire", "Kalphite Queen", "Hydra", "Rex", "Prime", "Supreme");
        $minigame = array("Soul Wars", "BA", "Fight Cave", "Inferno");
        $bloodhound = "bloodhound";
        $chompy = "chompy";

        if(str_contains($type_pet, "Skilling")) {
            $pet = array_rand($skilling, 1);
        } else if (str_contains($type_pet, "Combat")){
            $pet = array_rand($combat, 1);
        } else if (str_contains($type_pet, "NonCombat")){
            $pet = array_rand($noncombat, 1);
        } else if (str_contains($type_pet, "Slayer")){
            $pet = array_rand($slayer, 1);
        } else if (str_contains($type_pet, "Minigame")){
            $pet = array_rand($minigame, 1);
        } else if (str_contains($type_pet, "Bloodhound")){
            $pet = "BloodHound";
        } else if (str_contains($type_pet, "Chompy")){
            $pet = "Chompy Chick";
        }
        return $pet;
    }

    function complete_task() {

    }

    function generate_forfeit() {

    }

    


?>
