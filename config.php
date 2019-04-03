<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$DATABASE_URL = parse_url(getenv("DATABASE_URL"));

$CFG->dbtype    = 'pgsql';
$CFG->dblibrary = 'native';
$CFG->dbhost    = $DATABASE_URL["host"];
$CFG->dbname    = ltrim($DATABASE_URL["path"], "/");
$CFG->dbuser    = $DATABASE_URL["user"];
$CFG->dbpass    = $DATABASE_URL["pass"];
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => $DATABASE_URL["port"];,
  'dbsocket' => '',
);

$CFG->wwwroot   = getenv('WWWROOT');
$CFG->dataroot  = getenv('DATAROOT');
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
