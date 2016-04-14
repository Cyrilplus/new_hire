<?php

header('Content-Type:text/html;charset=utf-8');
$method = false;

if (!isset($_POST['method'])) {
    return;
}
$method = $_POST['method'];

function get_new_hire_json()
{
    /* Construct the MongoDB Manager. For brevity, we're only connecting to one node
   * here, but you'd likely want to specify several replica set members in a
   * comma-delimited seed list */
  $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
  /* Construct a query with an empty filter (i.e. "select all") */
  $query = new MongoDB\Driver\Query([]);

    try {
        /* Specify the full namespace as the first argument, followed by the query
        * object and an optional read preference. MongoDB\Driver\Cursor is returned
        * success; otherwise, an exception is thrown. */
        $cursor = $manager->executeQuery('new_hire_db.new_hires', $query)->toArray();
        echo MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($cursor));
    } catch (MongoDB\Driver\Exception\Exception $e) {
        echo $e->getMessage(), "\n";
    }
}
function add_new_hire()
{
    $new_hire_id = $_POST['new_hire_id'];
    $new_hire_name = $_POST['new_hire_name'];
    $manager_id = $_POST['manager_id'];
    $manager_name = $_POST['manager_name'];
    $counter = 1;
    $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
    /* Construct a query with an empty filter (i.e. "select all") */
    $counter_query = new MongoDB\Driver\Query(['table_name' => 'new_hires']);

    try {
        /* Specify the full namespace as the first argument, followed by the query
         * object and an optional read preference. MongoDB\Driver\Cursor is returned
         * success; otherwise, an exception is thrown. */

        $cursor = $manager->executeQuery('new_hire_db.counters', $counter_query)->toArray();
        $counter_item = array();
        if (count($cursor) != 0) {
            echo 'counter in database'.$cursor[0]->counter;
            $counter = (int) $cursor[0]->counter + 1;
        }
        $counter_item['counter'] = $counter;
        $counter_bulk = new MongoDB\Driver\BulkWrite();
        $options = ['multi' => true, 'upsert' => false];
        $counter_bulk->update(array('table_name' => 'new_hires'), array('$set' => $counter_item), $options);
        $counter_result = $manager->executeBulkWrite('new_hire_db.counters', $counter_bulk);

        $new_hire_item = array();
        $new_hire_item['_id'] = $counter;
        $new_hire_item['new_hire_id'] = $_POST['new_hire_id'];
        $new_hire_item['new_hire_name'] = $_POST['new_hire_name'];
        $new_hire_item['manager_id'] = $_POST['manager_id'];
        $new_hire_item['manager_name'] = $_POST['manager_name'];
        $new_hire_item['created_time'] = date('Y/m/d H:i').'';

        $bulk = new MongoDB\Driver\BulkWrite();
        $bulk->insert($new_hire_item);
        $result = $manager->executeBulkWrite('new_hire_db.new_hires', $bulk);
    } catch (MongoDB\Driver\Exception\Exception $e) {
        echo $e->getMessage(), "\n";
    }
}
if ($method == 'get_new_hire_json') {
    get_new_hire_json();
} elseif ($method == 'add_new_hire') {
    add_new_hire();
}
