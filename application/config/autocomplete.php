<?php
// help IDE(s) support Codeigniter 2.0
/**
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Benchmark $benchmark
 * @property CI_Calendar $calendar
 * @property CI_Cart $cart
 * @property CI_Config $config
 * @property CI_Controller $controller
 * @property CI_Email $email
 * @property CI_Encrypt $encrypt
 * @property CI_Exceptions $exceptions
 * @property CI_Form_validation $form_validation
 * @property CI_Ftp $ftp
 * @property CI_Hooks $hooks
 * @property CI_Image_lib $image_lib
 * @property CI_Input $input
 * @property CI_Lang $language
 * @property CI_Loader $load
 * @property CI_Log $log
 * @property CI_Model $model
 * @property CI_Migration $migration
 * @property CI_Output $output
 * @property CI_Pagination $pagination
 * @property CI_Parser $parser
 * @property CI_Profiler $profiler
 * @property CI_Router $router
 * @property CI_Session $session
 * @property CI_Sha1 $sha1
 * @property CI_Table $table
 * @property CI_Trackback $trackback
 * @property CI_Typography $typography
 * @property CI_Unit_test $unit_test
 * @property CI_Upload $upload
 * @property CI_URI $uri
 * @property CI_User_agent $user_agent
 * @property CI_Xmlrpc $xmlrpc
 * @property CI_Xmlrpcs $xmlrpcs
 * @property CI_Zip $zip
 *
 * These are samples entries to make my own functions work.
 * Remove these and add you custom ones.
 *
 * @property User_m $user_m
 * @property Pos_log_m $pos_log_m
 * @property Room_m $room_m
 * @property Actual_in_room_m $actual_in_room_m
 *
 */

class CI_Controller {};
class MY_Controller extends CI_Controller {};
class Admin_Controller extends MY_Controller{};
class User_Controller extends MY_Controller{};
class Companies_Controller extends MY_Controller{};


/**
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Config $config
 * @property CI_Loader $load
 * @property CI_Session $session
 */

class CI_Model {};
class MY_Model extends CI_Model{};
class User_m extends MY_Model{};
class Login_m extends MY_Model{};
/* End of file autocomplete.php */
/* Location: ./application/config/autocomplete.php */
?>