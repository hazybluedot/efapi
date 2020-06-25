<?php
define("DBTABLE","dropbox");
define("TOPDIR","dropbox");
define("CMTTABLE","project_cmts");
define("LOGTABLE","dropbox_log");

// this used to be named get_student_info
function project_get_student_info($pi,$netid) {
	global $GBO;
	$q = "select * from students as s, sections as ss where s.section=ss.num and s.username='$netid'";
	$r[0] = $GBO->query($q)->fetch_object();
	if (!$r[0]) {
		$q = "select * from other_users where username='$netid'";
		$r[0] = $GBO->query_fetch_object($q);
		if ($r[0]) {
			$r[0]->last = $r[0]->loginname;
		} else {
			//$r[0]->username = $_SESSION['user']['username'];
			//$r[0]->last = $_SESSION['ldap']->last;
			//$r[0]->first = $_SESSION['ldap']->first;
			$r[0] = new stdClass();
			$r[0]->username = $netid;
			$r[0]->last = $netid;
			$r[0]->first = $netid;
			}
		$r[0]->section=0;
		$r[0]->desig='none';
        }
	$r[0]->tid='';
	if ($pi->teampid) {
	  $q="select tid from teams where pid='$pi->teampid' AND uid='".$r[0]->username."'";
	  $rtm = $GBO->query($q)->fetch_object();
	  if ($rtm) $r[0]->tid=$rtm->tid;
	  }
	//print_r($r);
	return $r;
	}

function getPeerReviewMap($pid,$sid=null,$rid=null) {
	global $GBO;
	if ($sid==null && $rid==null) {
 	  $q = "select * from project_reviewers where id='$pid'";
	  $r =  $GBO->query_fetch_object($q);
		//sif (!$r) echo "Error accessing review #$pid";
	} else {
	  $q = "select * from project_reviewers where pid='$pid' and sid='$sid' and rid='$rid'";
	  $r = $GBO->query_fetch_object($q);
		//if (!$r) echo "Error accessing review for $pid, $sid, $rid";
  }
	return $r;
}

function get_team_from_netid($pid,$netid) {
	global $GBO;
	$q = "select * from teams where pid='$pid' AND uid='$netid'";
	$r = $GBO->query_fetch_object($q);
	if (!$r) return '';
	else return $r->tid;
}

function get_team_info($pi,$tm) {
	global $GBO;

	$q = "select * from teams as t, students as s, sections as ss where t.pid='$pi->teampid' AND t.tid='$tm' AND s.username=t.uid AND s.section=ss.num";
	$rs = $GBO->query($q);
	
  // added this option 10/8/19 WRS
	if (false && $rs->numrows==0) { 
		// did not find a team, see if $tm was a netid
		$tm = get_team_from_netid($pi->teampid,$tm);
		if (!$tm) return null;
    // do query again with team
  	$q = "select * from teams as t, students as s, sections as ss where t.pid='$pi->teampid' AND t.tid='$tm' AND s.username=t.uid AND s.section=ss.num";
	  $rs = $GBO->query($q);
	}
	
	while ($r = $rs->fetch_object()) {
		$ti[]=$r;
		}
	return $ti;
	}
	
function get_project_comments($pid,$id,$user) {
	global $GBO;
	$pi = get_project_info($pid);
	if ($pi->review_type=='c') $user1 = 'ALL';
	else $user1 = $user;
	$q = "select * from " . CMTTABLE . " where pid='$pid' and id like '$id' and user like '$user1' order by id,user,cid";
	//echo $q;
	$rs = $GBO->query($q);
	$c = array();
	if ($rs) {
		while ($r = $rs->fetch_array()) {
//echo "<br>",$r['id'],$r['user'],$r['cid'];
			$c[$r['id']][$r['user']][$r['cid']] = $r;
			}
		}
	return $c;
	}

function save_project_comments($f_pid,$f_id,$user,$P,$pi) {
	global $GBO;
	//at some point may need to handle errors (transactions?)
	$pi = get_project_info($f_pid);
	if ($pi->review_type=='c') $user = 'ALL';
	delete_project_comments($f_pid,$f_id,$user);
	foreach ($pi->comment_fields as $cmt) {
	if (strlen(trim($cmt->id))==0) continue; 
	if (substr($cmt->id,0,1)=='%') continue;
	$nlist=array($cmt->id);
	if (substr($cmt->type,0,2)=='cb') {
		$exlist = explode("|",$cmt->extra);
		for ($i=0;$i<count($exlist);$i+=3) {
			$sid=$exlist[$i+1];
			if (strlen($sid)==0) $sid=$exlist[$i];
			$nlist[]=$cmt->id."_".$sid;
			}
		}
	foreach ($nlist as $id) {
      	  $fldcmt = $P["cmt_$id"];
          $fldgrade = $P["grade_$id"];
          if (strlen($fldgrade) || strlen($fldcmt)) {
		if (strlen($fldgrade)=='') $fldgrade="null";
		$fldcmt = $GBO->escape_string($fldcmt);
		$q = "insert into " . CMTTABLE . " set pid='$f_pid',id='$f_id',user='$user',cid='$id',grade=$fldgrade,cmt='$fldcmt'";
		$GBO->query($q);
		//echo $q;
		}
	  } 
     }	
   $fldcmt = $P["total_grade_raw"];
   $fldgrade = $P["total_grade"];
   
	$fldcmt = $GBO->escape_string($fldcmt);
	$q = "insert into " . CMTTABLE . " set pid='$f_pid',id='$f_id',user='$user',cid='total_grade',grade='$fldgrade',cmt='$fldcmt'";
	//echo $q;
	$GBO->query($q);
	}
	
function delete_project_comments($f_pid,$f_id,$user) {
	global $GBO;
	$pi = get_project_info($f_pid);
	if ($pi->review_type=='c') $user = 'ALL';
	$q = "delete from " . CMTTABLE .  " where user='$user' AND pid='$f_pid' AND id='$f_id'";
	//echo "$q<p>";
	$GBO->query($q);
	}

function parse_comment_fields($txt) {
	$r = [];
	if (strlen($txt)==0) return $r;
	$items = @explode(substr($txt,0,1),substr($txt,1));
	
	$r = array_reduce($items, function($carry, $item) {
		$heading = $carry['heading'];
		$obj = $carry['obj'];

		$item=str_replace(array("\n","\r"),array("",""),$item);
		$info = @explode('|',$item,4);
		$item = new stdClass();
		$item->id = trim($info[0]);
		$item->type = trim($info[1]);
		$options = @explode("/", $item->type);
		$item->type = array_shift($options);
		$item->options = $options;
		$item->label = trim($info[2]);
		//$item->extra = trim($info[3]);
		$extra = @explode('|', trim($info[3]));

		switch ($item->type) {
			case 'hdg':
				$carry['heading'] = $item->label;
				break;
			case 'tx':
				$item->rows = $extra[0];
				$item->cols = $extra[1];
				break;
			case 'rb':
				while(count($extra) > 1) {
					$level = ['label' => array_shift($extra), 
							  'value' => floatval(array_shift($extra)) ];
					$item->items[] = $level;
				}
				break;
			case 'num':
				$item->maxgrade = $extra[0];

			case 'cb':
				while(count($extra) > 2) {
					$option = ['text' => array_shift($extra),
								'id' => array_shift($extra),
								'value' => floatval(array_shift($extra))];
					$item->items[] = $option;
				}
			default:
				$item->extra = $extra;
		}
	
		if ($item->type == "hdg") {
			$carry['heading'] = $item->label;
		} else {
			$obj[$heading][] = $item;
			$carry['obj'] = $obj;
		}

		return $carry;
		}, ['heading' => '[ROOT]', 'obj'=>[]]);
	$r['items'] = $items;
	return $r['obj'];
}	

function get_project_info($pi, $id=NULL, $classconf) {
	$pid = $pi->pid;
	
	if ($pi->review_type=='pa' && $id) {
		$foo = getPeerReviewMap($id);
		$id = $foo->sid;
	}

	$pi->teamproj = ($pi->store_by=='%teamname%' || strlen($pi->teampid)>0);
	$pi->show_comments = (bool) $pi->show_comments == "1";
	$pi->maxsize = intval($pi->maxsize);
	$pi->maxfiles = intval($pi->maxfiles);
	$pi->use_git = utf8_decode($pi->use_git);
	$pi->visible = $pi->visible == "1";
	$pi->latepenalty = floatval($pi->latepenalty);
	if ($pi->teamproj && strlen($pi->teampid)==0) $pi->teampid=$pid;
	$pi->comment_fields = parse_comment_fields($pi->comment_fields);
	$pi->grademap = parse_grade_map($pi->grademap);
	$pi->common_comments = explode("|", $pi->common_comments);

	$pi->wwwdirtop = $classconf['wwwroot'] . "/" . TOPDIR . "/" . $pi->pid;
	$pi->localdirtop = realpath($classconf['localroot'] . "/" . TOPDIR . "/" . $pi->pid);
	
	if (gettype($id)=="string") {
		if ($pi->teamproj) $si = get_team_info($pi,$id);
		else $si = project_get_student_info($pi,$id);
		}
	else {
		$si=$id;
		}

	$vars['%sectname%'] = $si[0]->desig;
	$vars['%sectnum%'] = $si[0]->section;
	$vars['%netid%'] = $si[0]->username;
	$vars['%teamname%'] = $si[0]->tid;
	
	$pi->subdir = trim($pi->store_by);
	if ($pi->teamgrouping == 'bydirectory') {
	  // find an existing netid directory
	  $foo = glob("$pi->localdirtop/*/" . $si[0]->username); 
	  if (count($foo)) $pi->subdir = substr($foo[0],strlen($pi->localdirtop)+1);
	}
	$pi->subdir = str_replace(array_keys($vars),array_values($vars),$pi->subdir);
	$pi->wwwdir = $pi->wwwdirtop . "/" . $pi->subdir;
	$pi->localdir = $pi->localdirtop . "/" . $pi->subdir;
	$pi->si = $si;
	$pi->vars = $vars;
	if ($si && $pi->enable_type==0 && strlen($pi->enable_sections)>0) {
		//Allow times per section
		//example: 
		//	O||2006-11-24,
		//  S|2006-11-29|2006-11-30,
		//	P||2006-12-31
		$fbo=explode(",",$pi->enable_sections);
		foreach ($fbo as $fbo_line) {
			$fbo_line = trim($fbo_line);
			list($fbo_sect,$fbo_start,$fbo_end) = explode("|",$fbo_line);
			if (strncmp($fbo_sect,$si[0]->desig,strlen($fbo_sect))==0) {
				if (strlen($fbo_start)>0) $pi->time_start = $fbo_start;
				if (strlen($fbo_end)>0) $pi->time_end = $fbo_end;
				}
			}
		}	
	return $pi;
}

function get_project_dirlist($pi, $user = null) {
	$depth = count(explode("/", $pi->store_by));
	$Dir = new RecursiveDirectoryIterator($pi->localdir);
	$Iterator = new RecursiveIteratorIterator($Dir);
	if ($user) {
		$Regex = new RegexIterator($Iterator, '/\/' . $user .'/', RecursiveRegexIterator::GET_MATCH);
		return iterator_to_array($Regex);
	}
	return iterator_to_array($Iterator);
}
	
function get_project_filelist($pi) {
  	$flist = array();
	$d = @opendir($pi->localdir);
	if (!$d) return $flist;
	while ($f = readdir($d)) {
		if ($f=="." || $f==".." || $f=="th") continue;
		$flist[] = $f;
		}
	closedir($d);
	sort($flist);
	return $flist;
	}

function addlog($file,$action) {
	global $user,$GBO;
	$ip = $_SERVER['REMOTE_ADDR'];
	$file = addslashes($file);
	$q = "insert into " . LOGTABLE . " set file='$file',action='$action',user='$user',ip='$ip',daytime=NOW()";
	$GBO->query($q);
	}
	
function getlog($file) {
	global $GBO;
	$file = addslashes($file);
	$q = "select * from " . LOGTABLE . " where file='$file' and action like 'save%' order by daytime desc";
	$log = $GBO->query($q)->fetch_object();
	if (!$log) { $log = new stdClass(); $log->user=''; $log->ip=''; }
	return $log;
}

function showtext($label,$rr,$field) {
	writeln("<tr><td>$label:</td>");
	$c_field =  "c_" . $field;
	$g_field =  "g_" . $field;
	$r = $rr[$field];
	writeln("<td><input type=text size=4 name='$g_field' value='" . htmlentities($r->grade,ENT_QUOTES) . "'></td>");
	writeln("<td><input type=text size=60 name='$c_field' value='" . htmlentities($r->comments,ENT_QUOTES) . "'></td>");
	writeln("</tr>\n");
	}

function writeln() {
	$a = func_get_args();
	foreach ($a as $v) { echo $v; }
	echo "\n";
	return;
	}
	
function convert_comments() {
global $GBO;
echo "Converting comments...";
flush();
	$GBO->query("CREATE TABLE `project_cmts` (
  `pid` varchar(16) NOT NULL default '',
  `id` varchar(16) NOT NULL default '',
  `cid` varchar(16) NOT NULL default '',
  `user` varchar(16) NOT NULL default '',
  `grade` float default NULL,
  `cmt` text,
  `modtime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`pid`,`id`,`cid`,`user`)
) ENGINE=MyISAM DEFAULT CHARSET=ascii");

$GBO->query("ALTER TABLE `dropbox` ADD `review_type` VARCHAR(4)  NOT NULL DEFAULT 's'");

$q = "select * from project_comments";
$rs = $GBO->query($q);
while ($r = $rs->fetch_object()) {
	for ($i=1;$i<=10;$i++) {
		$fld = "f$i";
		$val = $r->$fld;
		if (strlen($val)) {
			$q = "insert into project_cmts set pid='$r->pid',id='$r->id',user='$r->user',cid='$fld',cmt='$val'";
			echo $q,"<br>";
			$GBO->query($q);
			}
		}
	}
}

function get_default_scores($qid,$uid) {
	global $GBO;
	$r = array();
	$q = "select qs.tid,qu.qlist,qs.probval,qs.subprobval from quiz_setup as qs, quiz_usersetup as qu where qs.tid=qu.tid and qs.shortname='$qid' and qu.netid='$uid'";
	$qmd = $GBO->query($q)->fetch_object();
	if (!$qmd) return $r;
	$qn = 0;
	foreach (explode(",",$qmd->qlist) as $qid) {
		$qn++;
		$q =  "select * from quiz_results where netid='$uid' and tid=$qmd->tid and qid=$qid";
		$amd = $GBO->query($q)->fetch_object();
		if ($amd) {
			$cf = unserialize($amd->correctflag);
			$pn=0;
			foreach (explode(",",$amd->alist) as $aid) {
				$nm = sprintf('q%02u%c',$qn,ord('a')+$pn);
 				if ($cf[$aid]==1) $r[$nm] = $qmd->subprobval;
 				//kludge for ef105 $qmd->probval;
				//if ($cf[$aid]==1) $r[$nm] = 3;
				$pn++;
				}
			}
		}
	return $r;
	}

function parse_grade_map($txt) {
	$r = array();
	$map = explode(',',$txt);
	foreach ($map as $gi) {
		list($element,$gradename) = explode("|",$gi);
		$r[$element] = $gradename;
		}
	return $r;
	}
		
function update_project_grade($pid,$pi,$id="") {
// id is the team/student, blank if updating all 
	global $user,$GBO;
  //echo "in update $pid,$id";
	$uplist=array();
	if ($id=="") $id='%';  //update all students/teams
	if ($pi->teamproj) { //get list of all teams and members
	    $q="select tid,uid from teams where pid='$pi->teampid' and tid like '$id' order by tid,uid";
      //echo "$q<br>";
	    $rs=$GBO->query($q);
	    while ($r=$rs->fetch_object()) {
	      $uplist[$r->tid][]=$r->uid;
	      }
	} else { //get list of all students
	    $q="select username from students where username like '$id' order by username";
      //echo "$q<br>";
	    $rs=$GBO->query($q);
	    while ($r=$rs->fetch_object()) {
	      $uplist[$r->username][]=$r->username;
	      } 
	}
		  
	if ($pi->review_type=='t' || $pi->review_type=='p') {
		$grade_eq='avg(grade) as g';
	} else {
		$grade_eq='max(grade) as g';
	}
//echo "updating";
//print_r($pi->grademap);
//print_r($uplist);
	foreach ($pi->grademap as $from=>$to) {
		foreach ($uplist as $id=>$userlist) {
			$grade=0;
			if ($from=='total_grade') {
			  // get each grade part and add them up
			  $q2 = "select cid,$grade_eq from " . CMTTABLE . " where pid='$pid' and id='$id' and cid <> 'total_grade' group by cid";
			  //echo "$q2<br>";
			  $rs2 = $GBO->query($q2);
			  while ($r2=$rs2->fetch_object()) {
			    $grade+=$r2->g;
			    //echo "$r2->cid, $r2->g<br>";
			    }
			} else {
			  $q = "select id,$grade_eq from " . CMTTABLE . " where pid='$pid' and cid='$from' and id='$id'";
			  //echo "$q<br>";
			  $r = $GBO->query($q)->fetch_object();
			  if ($r) $grade=$r->g;
			}
			if (strlen($grade)>0) $grade=round($grade,2);
			foreach ($userlist as $u) {
        echo "Setting grade $to for $u comment field $from to '$grade'<br>";
			  updategrade($u,$to,$grade,$user,false);
		          }	
			}
		}
	}

function count_files($dir) {
	$c = 0;
	$dh = @opendir("$dir");
	if (!$dh) return -1;
	while (($file = readdir($dh)) !== false) {
		if (is_file("$dir/$file")) $c++;
		}
	closedir($dh);
	return ($c);
	}

//not used???
function get_project_times($pi,$si=null) {
	if (gettype($pi)=="string") $pi = get_project_info($pi,$si);
		$ontime = strtotime($pi->time_start);
		$offtime = strtotime($pi->time_end);
		$latetime = strtotime($pi->time_late);
		if (strlen($pi->enable_sections)>0) {
			//Allow times per section
			//example: 
			//	O||2006-11-24,
			//  S|2006-11-29|2006-11-30,
			//	P||2006-12-31
			$fbo=explode(",",$pi->enable_sections);
			foreach ($fbo as $fbo_line) {
				$fbo_line = trim($fbo_line);
				list($fbo_sect,$fbo_on,$fbo_off) = explode("|",$fbo_line);
				if (strncmp($fbo_sect,$si[0]->desig,strlen($fbo_sect))==0) {
					if (strlen($fbo_on)>0) $ontime = strtotime($fbo_on);
					if (strlen($fbo_off)>0) $offtime = strtotime($fbo_off);
					}
				}
			}
	return array($ontime,$offtime,$latetime);
	}
	
function get_late_penalty($pi,$time,$maxpen=100) {
  $res = new stdClass;
  $res->pen = 0;
  $res->days = 0;
  $res->msg = '';
  if ($pi->latepenalty==0) return $res;

  $latetime = strtotime($pi->time_late);
  if ($time<=$latetime) return $res; // not late
 
  $res->days = round(($time-$latetime)/(60*60*24),1);
  if ($pi->latepenalty>0) { // points/day
    $res->pen = round($pi->latepenalty*$res->days);
  } else { // fixed penalty
    $res->pen = abs($pi->latepenalty);
  }    
  $res->pen = min($res->pen,$maxpen);
  $res->msg = "<font color=red>$res->days days late, -$res->pen pts</font>";
  return $res;
}
  
function get_upload_status_text($code) {
        switch ($code) { 
            case UPLOAD_ERR_OK: 
                $message = "The file was uploaded successfully"; 
                break; 
            case UPLOAD_ERR_INI_SIZE: 
                $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini"; 
                break; 
            case UPLOAD_ERR_FORM_SIZE: 
                $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                break; 
            case UPLOAD_ERR_PARTIAL: 
                $message = "The uploaded file was only partially uploaded"; 
                break; 
            case UPLOAD_ERR_NO_FILE: 
                $message = "No file was uploaded"; 
                break; 
            case UPLOAD_ERR_NO_TMP_DIR: 
                $message = "Missing a temporary folder"; 
                break; 
            case UPLOAD_ERR_CANT_WRITE: 
                $message = "Failed to write file to disk"; 
                break; 
            case UPLOAD_ERR_EXTENSION: 
                $message = "File upload stopped by extension"; 
                break; 
            default: 
                $message = "Unknown upload error"; 
                break; 
        } 
        return $message; 
} 

function getFilePreview($url,$local) {
	global $wwwserver,$gbowwwroot;
	$preview = '';
	//$imgExtensions = ['jpg','jpeg','png'];
  $ext = strtolower(pathinfo($url,PATHINFO_EXTENSION));
	//if (in_array($ext,$imgExtensions)) return "<img src='$url' width=500 border=0>";
	if (exif_imagetype($local)) return "<img src='$url' width=500 border=0>";
	if ($ext=='heic') return "<img src='$gbowwwroot/tifig/viewheic.php?f=$local' width=500 border=0>";
	if ($ext=='pdf') return "<iframe src=\"$url\" width=500 height=400></iframe>";
	if ($ext=='doc' || $ext=='docx' || $ext=='xls' || $ext=='xlsx' || $ext=='ppt' || $ext=='pptx') {
		$viewer = "https://view.officeapps.live.com/op/embed.aspx?src=$wwwserver/$url";
		return "<iframe src='$viewer' width='100%' height='400px' frameborder='0'></iframe>";
	}
	return '';
}

?>

