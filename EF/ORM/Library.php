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
        $this->author = $user['name'] . ' ' . $user['email'];
        $this->repobase = realpath($repobase);
        $this->messages = [];
    }

    function stage($path, $meta, $doc) {
        // initialize repo if doesn't already exist
        $repo_path = $this->repobase . '/' . $path;
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
        $repo_path = $this->repobase . '/' . $path;
        if (!file_exists($repo_path) && !is_dir($repo_path)) {
            echo "Error: Stage file first\n";
            return;
        }
        $repo = new GitRepository($repo_path);
        
        // Commit with message
        if ($repo->hasChanges()) {
            $repo->commit($message, array('--author="' . $this->author .'"'));
        } else {
            echo "$path: No changes to commit" . "\n";
        }
    }

    function get($path) {
        $itemPath = $this->repobase . '/' . $path . '/' . 'item.md';
        
        if (file_exists($itemPath)) {
            $contents = file_get_contents($itemPath);
            $document = $this->yamlParser->parse($contents);
            return $document;
        } else {
            return null;
        }
    }
}
