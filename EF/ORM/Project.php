<?

namespace EF\ORM;

define("DBTABLE","dropbox");
define("TOPDIR","dropbox");
define("CMTTABLE","project_cmts");
define("LOGTABLE","dropbox_log");

class Rubric {
	function __construct($comment_field) {
	}
}

class Project {
	private $store_by = "";
	private $localdir = null;
	private $localdirtop = null;

	function __construct($pid, $db, $classconf, $user) {
		$q = "SELECT * FROM `dropbox` WHERE pid = ?;";
		
		$pi = $db->query($q, function($result) use ($classconfig, $user) {	
			return $result->fetch_object();
		}, 's', $pid);
		if (is_null($pi->pid)) {
			throw new RunTimeException("Project not found");
		}
		
		$this->pid = $pid = $pi->pid;
	
		if ($this->review_type=='pa' && $id) {
			$foo = getPeerReviewMap($id);
			$id = $foo->sid;
		}

		$this->store_by = $pi->store_by;
		$this->teamproj = ($pi->store_by=='%teamname%' || strlen($this->teampid)>0);
		$this->show_comments = (bool) $this->show_comments == "1";
		$this->maxsize = intval($pi->maxsize);
		$this->maxfiles = intval($pi->maxfiles);
		$this->use_git = utf8_decode($pi->use_git);
		$this->visible = $this->visible == "1";
		$this->latepenalty = floatval($pi->latepenalty);
		if ($this->teamproj && strlen($pi->teampid)==0) $this->teampid=$pid;
		$this->rubric = new Rubric($pi->comment_fields);
		$this->grademap = parse_grade_map($pi->grademap);
		$this->common_comments = explode("|", $this->common_comments);

		$this->wwwdirtop = $classconf['wwwroot'] . "/" . TOPDIR . "/" . $this->pid;
		$this->localdirtop = realpath($classconf['localroot'] . "/" . TOPDIR . "/" . $this->pid);
	
		if (gettype($id)=="string") {
			if ($this->teamproj) {
				$si = get_team_info($pi,$id);
			} else {
				$si = project_get_student_info($pi,$id);
			}
		} else {
			$si=$id;
		}

		$vars['%sectname%'] = $si[0]->desig;
		$vars['%sectnum%'] = $si[0]->section;
		$vars['%netid%'] = $si[0]->username;
		$vars['%teamname%'] = $si[0]->tid;
	
		$this->subdir = trim($this->store_by);
		if ($this->teamgrouping == 'bydirectory') {
		  // find an existing netid directory
		  $foo = glob("$this->localdirtop/*/" . $si[0]->username); 
		  if (count($foo)) $this->subdir = substr($foo[0],strlen($this->localdirtop)+1);
		}
		$this->subdir = str_replace(array_keys($vars),array_values($vars),$this->subdir);
		$this->wwwdir = $this->wwwdirtop . "/" . $this->subdir;
		$this->localdir = $this->localdirtop . "/" . $this->subdir;
		$this->si = $si;
		$this->vars = $vars;
		if ($si && $this->enable_type==0 && strlen($this->enable_sections)>0) {
		//Allow times per section
		//example: 
		//	O||2006-11-24,
		//  S|2006-11-29|2006-11-30,
		//	P||2006-12-31
		$fbo=explode(",",$this->enable_sections);
		foreach ($fbo as $fbo_line) {
			$fbo_line = trim($fbo_line);
			list($fbo_sect,$fbo_start,$fbo_end) = explode("|",$fbo_line);
			if (strncmp($fbo_sect,$si[0]->desig,strlen($fbo_sect))==0) {
				if (strlen($fbo_start)>0) $this->time_start = $fbo_start;
				if (strlen($fbo_end)>0) $this->time_end = $fbo_end;
				}
			}
		}		
	}

	public function getFileList() {
		$depth = count(explode("/", $this->store_by));
		$Dir = new RecursiveDirectoryIterator($this->localdirtop);
		$Iterator = new RecursiveIteratorIterator($Dir);
		$Regex = new RegexIterator($Iterator, '|([^/]+)/([^/]+)/.$|', RecursiveRegexIterator::GET_MATCH);
		if ($this->user) {
			//$Regex = new RegexIterator($Iterator, '/\/' . $user .'/', RecursiveRegexIterator::GET_MATCH);
			//return iterator_to_array($Regex);
		}
		#foreach($Regex as $dir) {
		#	print_r($dir);
		#}
		
		return array_values(iterator_to_array($Regex));
	}
}
