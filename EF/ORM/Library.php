<?php

namespace EF\ORM;

use Cz\Git\GitRepository as GitRepository;
use Symfony\Component\Yaml\Dumper as SymfonyYAMLDumper;
use Mni\FrontYAML\Parser as YAMLParser;

class Library {
    private $classconfig;
    private $db;
    private $messages;
    
    function __construct($user, $repobase) {
        $this->yamlDumper = new SymfonyYAMLDumper();
		$this->yamlParser = new YAMLParser();
        $this->user = $user;
        $this->author = $user['name'] . ' <' . $user['email'] . '>';
        $this->repobase = realpath($repobase);
        $this->workingbase = $this->repobase . '/working';
        $this->deploybase = $this->repobase . '/deploy';
        $this->messages = [];
        $this->debug = false;
    }

    function setDebug(bool $bool) {
        $this->debug = $bool;
    }
    
    function stage($path, $meta, $doc) {
        // initialize repo if doesn't already exist
        $repo_path = $this->workingbase . '/' . $path;
        if (!file_exists($repo_path) && !is_dir($repo_path)) {
            echo "intializing new repo: $repo_path\n";
            $repo = GitRepository::init($repo_path);
        } else {
            $repo = new GitRepository($repo_path);
        }

        $meta['published'] = isset($meta['published']) ? $meta['published'] : true;
        $frontMatter = $this->yamlDumper->dump($meta, 2);
        $file_path = $repo_path . '/' . 'item.md';
        
        // stage chunk
        $fp = fopen($file_path, 'w');
        fwrite($fp, "---\n");
        fwrite($fp, $frontMatter);
        fwrite($fp, "---\n");
        fwrite($fp, $doc);
        fclose($fp);
        $repo->addFile('item.md');
    }

    function commit($path, $message) {
        // Must fist be staged
        $repo_path = $this->workingbase . '/' . $path;
        $deploy_path = $this->deploybase . '/' . $path;
        
        if (!file_exists($repo_path) && !is_dir($repo_path)) {
            echo "Error: Stage file first\n";
            return;
        }
        $repo = new GitRepository($repo_path);
        
        // Commit with message
        if ($repo->hasChanges()) {
            $repo->commit($message, array('--author="' . $this->author .'"'));
            if (!file_exists($deploy_path) && !is_dir($deploy_path)) {
                $deploy_repo = GitRepository::cloneRepository($repo_path, $this->deploybase . '/' . $path);
            } else {
                $deploy_repo = new GitRepository($this->deploybase . '/' . $path);
            }
            $deploy_repo->pull();
        } else {
            echo "$path: No changes to commit" . "\n";
        }
    }

    function items() {
        $deploy_path = $this->deploybase;
        $Dir = new \RecursiveDirectoryIterator($deploy_path, \RecursiveDirectoryIterator::SKIP_DOTS);
        $Files = new \RecursiveCallbackFilterIterator($Dir, function($current, $key, $iterator) {
            if ($iterator->hasChildren() && $current->getFilename() !== '.git') {
                return true;
            }
            return $current->getFilename() === 'item.md';
        });

        $files = iterator_to_array(new \RecursiveIteratorIterator($Files));
        $items = array_map(function($fileinfo) {
            $path = $fileinfo->getPath();
            $pathParts = explode('/', $path);
            $morea_id = array_pop($pathParts);
            $morea_type = array_pop($pathParts);
            $contents = file_get_contents($path . '/item.md');
            $doc = $this->yamlParser->parse($contents);
            $resp = $doc->getYAML();
            $resp['morea_type'] = $morea_type;
            $resp['morea_id'] = $morea_id;
            return $resp; 
        }, array_values($files));

        return $items;
    }
    
    function get($path, $working = false) {
        if ($this->debug) echo "DEBUG get(\$path, \$working) with path='$path', working=$working\n";
        if (strpos($path, '/') === FALSE) {
            #$parts = explode('-', $path);
            #$type = array_shift($parts);
            #$path = 'module/' . implode('-', $parts);
            return null;
        }
        
        $basePath = $working ? $this->workingbase : $this->deploybase;
        $itemPath = $basePath . '/' . $path . '/' . 'item.md';

        if ($this->debug) echo "DEBUG itemPath: $itemPath\n";
        
        $pathParts = explode('/', $path);
        
        if (file_exists($itemPath)) {
            $contents = file_get_contents($itemPath);
            $document = $this->yamlParser->parse($contents, false);
            return $document;
        } else {
            return null;
        }
    }

    function hasWorkingCopy($path) {
        $workingPath = $this->workingbase . '/' . $path . '/' . 'item.md';
        $itemPath = $this->deploybase . '/' . $path . '/' . 'item.md';
        if (file_exists($itemPath)) {
            $workingTime = filectime($workingPath);
            if ($workingTime === false) return false;
            return $workingTime > filectime($itemPath);
        } else {
            return null;
        }
    }
}
