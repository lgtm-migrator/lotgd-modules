<?php
function citythemedcreatures_getmoduleinfo(){
    $info = array(
        "name"=>"City Themed Creatures",
        "version"=>"20070202",
        "author"=>"<a href='http://www.joshuadhall.com'>Sixf00t4</a>",
        "category"=>"Forest",
        "vertxtloc"=>"http://www.legendofsix.com/",
        "description"=>"Allows creatures to only appear in certain forests",
        "download"=>"http://dragonprime.net/index.php?module=Downloads;sa=dlview;id=1189",
        "settings"=>array(
			"usestats"=>"Use unbuffed creature hp/atk/def?,bool|0",
		),
        "prefs"=>array(
			"lastloc"=>"Where was the player last?,text|Degolburg",
		),
		"prefs-creatures"=>array(
			"creatureanywhere"=>"Is this creature available in every forest?,bool|1",
			"usestats"=>"Use unbuffed creature hp/atk/def?,bool|0",
            "creatureloc"=>"Where does this creature appear?,location|".getsetting("villagename", LOCATION_FIELDS)
		),
	);
        return $info;
}

function citythemedcreatures_install(){
    module_addhook("buffbadguy");
    module_addhook("village");
    return true;
}

function citythemedcreatures_uninstall() {
	return true;
}

function citythemedcreatures_dohook($hookname,$args) {
	global $session;

	switch ($hookname) {

        case "village":
            set_module_pref("lastloc",$session['user']['location'],"citythemedcreatures");
        break;

        case "buffbadguy":

            if (! isset($args['creatureid']) || ! $args['creatureid']) return $args;

			if(!get_module_objpref("creatures",$args['creatureid'],"creatureanywhere")
			&& (!get_module_objpref("creatures",$args['creatureid'],"creatureloc")!=
				get_module_pref("lastloc"))){
				$creatures = DB::prefix("creatures");
				$module_objprefs = DB::prefix("module_objprefs");
				$sql = "SELECT $creatures.creatureid as id, $module_objprefs.objid
				FROM $module_objprefs INNER JOIN $creatures
				ON $creatures.creatureid = $module_objprefs.objid
				WHERE $module_objprefs.setting = 'creatureloc'
				and $creatures.creaturelevel = ".$args['creaturelevel']."
				AND $module_objprefs.value = '".get_module_pref("lastloc")."'
				AND $creatures.forest=1 ORDER BY rand(".e_rand().")";
				$result = DB::query($sql) or die(db_error(LINK));
				$badguy = array();
				for ($i=0;$i<DB::num_rows($result);$i++){
					$row=DB::fetch_assoc($result);
					if(get_module_objpref("creatures",$row['id'],"creatureanywhere")==0){
						$sql2="select * from ".DB::prefix("creatures")." where creatureid=".$row['id'];
						$result2=DB::query($sql2);
						$badguy=DB::fetch_assoc($result2);
						if(get_module_setting("usestats") || get_module_objpref("creatures",$badguy['creatureid'],"usestats")){
							$args=$badguy;
						}else{
							$args['creaturename']=$badguy['creaturename'];
							$args['creatureweapon']=$badguy['creatureweapon'];
							$args['creaturewin']=$badguy['creaturewin'];
							$args['creaturelose']=$badguy['creaturelose'];
							}
						$i=DB::num_rows($result);
					}
				}
			}
        break;
	}
	return $args;
}

function citythemedcreatures_run(){}
?>
