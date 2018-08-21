<?php
require_once 'wp-config.php';

require_once 'wp-load.php';
require_once ABSPATH . 'wp-admin/includes/plugin.php';
?>


<?php


// Specify old url
$old_url = 'http://localhost/boyne/';
$old_url = untrailingslashit( $old_url );

// Specify New url
$new_url = 'http://coderkube.com.md-in-58.webhostbox.net/Web/Boyne/';
$new_url = trim( $new_url );
$new_url = untrailingslashit( $new_url );

global $wpdb;
// ========================================================================================================
// 1. List out all the tables
// 2. Get each table's column names
// 3. Get Primary key of table so we can update the table by it.
// 4. List out all the column which are having old url
// 5. Start Updating the database by loop
// ========================================================================================================
// 1. List out all the database tables
$query = "SHOW TABLES LIKE '%'";
$results = $wpdb->get_results( $query );
/*
 * @var $tables array
 * @stores all the database tables and its unique primary key and column which contains the old url
 */
$tables = array();
$prefix = $wpdb->prefix;
foreach ( $results as $index => $value ) {
   foreach ( $value as $table_name ) {

// 2. Will result table's column names
      foreach ( $wpdb->get_col( 'DESC ' . $table_name, 0 ) as $column_name ) {

// 3. Get Primary key of current table
         $query = "SHOW KEYS FROM `$table_name` WHERE Key_name = 'PRIMARY'";
         $key = $wpdb->get_results( $query );
         $primary_key = $key[0]->Column_name;

// 4. List out columns which contains the old url portion
         $query = "SELECT `$column_name` FROM `$table_name` WHERE `$column_name` LIKE '%{$old_url}%'";
         $cols = $wpdb->get_results( $query );

         if ( $cols ) {
            $col_value = $cols[0]->$column_name;
//$new_col_value = $replace_url = str_replace( $old_url, $new_url, $col_value ); // Update col_value
            $tables[$table_name][$primary_key][] = $column_name;
         }
      }
   }
}

// 5. Updating database
foreach ( $tables as $table_name => $primary_key ) {

   foreach ( $primary_key as $index => $ary_cols ) {
      $count = count( $ary_cols );
      if ( $count == 1 ) {
         $col_name = $ary_cols[0];
         $query = "SELECT * FROM `$table_name` WHERE `$col_name` LIKE '%{$old_url}%'";
         $results = $wpdb->get_results( $query );
         foreach ( $results as $key => $val ) {
            $row_id = $val->$index;
            $col_value = $val->$col_name;
            $replace_url = str_replace( $old_url, $new_url, $col_value );
            $replace_url = sanitize_text_field( $replace_url );
            $query = "UPDATE `$table_name` SET `$col_name` = '$replace_url' WHERE `$index` = '$row_id'";
            $wpdb->query( $query );
         }
      } else if ( $count > 1 ) {

         $conditions = array();
         foreach ( $ary_cols as $column ) {
            $conditions[] = "`$column` LIKE '%{$old_url}%'";
         }
         $conditions = implode( ' OR ', $conditions );
         $query = "SELECT * FROM `$table_name` WHERE $conditions";
         $results = $wpdb->get_results( $query );
         foreach ( $results as $key => $val ) {
            $row_id = $val->$index;

            foreach ( $ary_cols as $column ) {
               $col_value = $val->$column;

               $is_url_exist = strpos( $col_value, $old_url );
               if ( $is_url_exist !== FALSE ) {
                  $replace_url = str_replace( $old_url, $new_url, $col_value );
                  $replace_url = addslashes( $replace_url );
                  $query = "UPDATE `$table_name` SET `$column` = '$replace_url' WHERE `$index` = '$row_id'";
                  $wpdb->query( $query );
               }
            }
         }
      } else {
// Do nothing
      }
   }
}
