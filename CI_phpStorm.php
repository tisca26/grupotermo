<?php  die('This file is not really here!');

/**
 * ------------- DO NOT UPLOAD THIS FILE TO LIVE SERVER ---------------------
 *
 * Implements code completion for CodeIgniter in phpStorm
 * phpStorm indexes all class constructs, so if this file is in the project it will be loaded.
 *
 *
 * This property values were borrowed from another site on the internet
 * This is just a better way to implement it, rather than editing core CI files
 *
 * PHP version 5
 *
 * LICENSE: GPL http://www.gnu.org/copyleft/gpl.html
 *
 * Created 1/28/12, 11:06 PM
 *
 * @category
 * @package    CodeIgniter CI_phpStorm.php
 * @author     Jeff Behnke
 * @copyright  2009-11 Valid-Webs.com
 * @license    GPL http://www.gnu.org/copyleft/gpl.html
 * @version    2012.02.03
 */

/**
 * @property CI_DB_active_record $db              This is the platform-independent base Active Record implementation class.
 * @property CI_DB_forge $dbforge                 Database Utility Class
 * @property CI_Benchmark $benchmark              This class enables you to mark points and calculate the time difference between them.<br />  Memory consumption can also be displayed.
 * @property CI_Calendar $calendar                This class enables the creation of calendars
 * @property CI_Cart $cart                        Shopping Cart Class
 * @property CI_Config $config                    This class contains functions that enable config files to be managed
 * @property CI_Controller $controller            This class object is the super class that every library in.<br />CodeIgniter will be assigned to.
 * @property CI_Email $email                      Permits email to be sent using Mail, Sendmail, or SMTP.
 * @property CI_Encrypt $encrypt                  Provides two-way keyed encoding using XOR Hashing and Mcrypt
 * @property CI_Exceptions $exceptions            Exceptions Class
 * @property CI_Form_validation $form_validation  Form Validation Class
 * @property CI_Ftp $ftp                          FTP Class
 * @property CI_Hooks $hooks                      //dead
 * @property CI_Image_lib $image_lib              Image Manipulation class
 * @property CI_Input $input                      Pre-processes global input data for security
 * @property CI_Lang $lang                        Language Class
 * @property CI_Loader $load                      Loads views and files
 * @property CI_Log $log                          Logging Class
 * @property CI_Model $model                      CodeIgniter Model Class
 * @property CI_Output $output                    Responsible for sending final output to browser
 * @property CI_Pagination $pagination            Pagination Class
 * @property CI_Parser $parser                    Parses pseudo-variables contained in the specified template view,<br />replacing them with the data in the second param
 * @property CI_Profiler $profiler                This class enables you to display benchmark, query, and other data<br />in order to help with debugging and optimization.
 * @property CI_Router $router                    Parses URIs and determines routing
 * @property CI_Session $session                  Session Class
 * @property CI_Sha1 $sha1                        Provides 160 bit hashing using The Secure Hash Algorithm
 * @property CI_Table $table                      HTML table generation<br />Lets you create tables manually or from database result objects, or arrays.
 * @property CI_Trackback $trackback              Trackback Sending/Receiving Class
 * @property CI_Typography $typography            Typography Class
 * @property CI_Unit_test $unit_test              Simple testing class
 * @property CI_Upload $upload                    File Uploading Class
 * @property CI_URI $uri                          Parses URIs and determines routing
 * @property CI_User_agent $user_agent            Identifies the platform, browser, robot, or mobile devise of the browsing agent
 * @property CI_Validation $validation            //dead
 * @property CI_Xmlrpc $xmlrpc                    XML-RPC request handler class
 * @property CI_Xmlrpcs $xmlrpcs                  XML-RPC server class
 * @property CI_Zip $zip                          Zip Compression Class
 * @property CI_Javascript $javascript            Javascript Class
 * @property CI_Jquery $jquery                    Jquery Class
 * @property CI_Utf8 $utf8                        Provides support for UTF-8 environments
 * @property CI_Security $security                Security Class, xss, csrf, etc...
 * @property CI_Driver_Library $driver            CodeIgniter Driver Library Class
 * @property CI_Cache $cache                      CodeIgniter Caching Class
 */
class CI_Controller extends my_models
{
    public function __construct() {
        log_message('info', 'Controller Class Initialized: ControllerFake');
    } //This default return construct as set
}

/**
 * @property CI_DB_query_builder $db              This is the platform-independent base Query Builder implementation class.
 * @property CI_DB_forge $dbforge                 Database Utility Class
 * @property CI_Benchmark $benchmark              This class enables you to mark points and calculate the time difference between them.<br />  Memory consumption can also be displayed.
 * @property CI_Calendar $calendar                This class enables the creation of calendars
 * @property CI_Cart $cart                        Shopping Cart Class
 * @property CI_Config $config                    This class contains functions that enable config files to be managed
 * @property CI_Controller $controller            This class object is the super class that every library in.<br />CodeIgniter will be assigned to.
 * @property CI_Email $email                      Permits email to be sent using Mail, Sendmail, or SMTP.
 * @property CI_Encrypt $encrypt                  Provides two-way keyed encoding using XOR Hashing and Mcrypt
 * @property CI_Exceptions $exceptions            Exceptions Class
 * @property CI_Form_validation $form_validation  Form Validation Class
 * @property CI_Ftp $ftp                          FTP Class
 * @property CI_Hooks $hooks                      //dead
 * @property CI_Image_lib $image_lib              Image Manipulation class
 * @property CI_Input $input                      Pre-processes global input data for security
 * @property CI_Lang $lang                        Language Class
 * @property CI_Loader $load                      Loads views and files
 * @property CI_Log $log                          Logging Class
 * @property CI_Model $model                      CodeIgniter Model Class
 * @property CI_Output $output                    Responsible for sending final output to browser
 * @property CI_Pagination $pagination            Pagination Class
 * @property CI_Parser $parser                    Parses pseudo-variables contained in the specified template view,<br />replacing them with the data in the second param
 * @property CI_Profiler $profiler                This class enables you to display benchmark, query, and other data<br />in order to help with debugging and optimization.
 * @property CI_Router $router                    Parses URIs and determines routing
 * @property CI_Session $session                  Session Class
 * @property CI_Sha1 $sha1                        Provides 160 bit hashing using The Secure Hash Algorithm
 * @property CI_Table $table                      HTML table generation<br />Lets you create tables manually or from database result objects, or arrays.
 * @property CI_Trackback $trackback              Trackback Sending/Receiving Class
 * @property CI_Typography $typography            Typography Class
 * @property CI_Unit_test $unit_test              Simple testing class
 * @property CI_Upload $upload                    File Uploading Class
 * @property CI_URI $uri                          Parses URIs and determines routing
 * @property CI_User_agent $user_agent            Identifies the platform, browser, robot, or mobile devise of the browsing agent
 * @property CI_Validation $validation            //dead
 * @property CI_Xmlrpc $xmlrpc                    XML-RPC request handler class
 * @property CI_Xmlrpcs $xmlrpcs                  XML-RPC server class
 * @property CI_Zip $zip                          Zip Compression Class
 * @property CI_Javascript $javascript            Javascript Class
 * @property CI_Jquery $jquery                    Jquery Class
 * @property CI_Utf8 $utf8                        Provides support for UTF-8 environments
 * @property CI_Security $security                Security Class, xss, csrf, etc...
 * @property CI_Driver_Library $driver            CodeIgniter Driver Library Class
 * @property CI_Cache $cache                      CodeIgniter Caching Class
 */
class CI_Model
{
    public function __construct() {} //This default return construct as set
}

/**
 * Add you custom models here that you are loading in your controllers
 *
 * <code>
 * $this->site_model->get_records()
 * </code>
 * Where site_model is the model Class
 *
 * ---------------------- Models to Load ----------------------
 * <examples>
 *
 * @property acl_model 					            $acl_model
 * @property activos_categoria_model                $activos_categoria_model
 * @property activos_model                          $activos_model
 * @property bancos_model                           $bancos_model
 * @property almacenes_model                        $almacenes_model
 * @property almacenes_bitacora_model               $almacenes_bitacora_model
 * @property almacen_activos_model                  $almacen_activos_model
 * @property almacen_materiales_model               $almacen_materiales_model
 * @property cambiocontrasena_model                 $cambiocontrasena_model
 * @property cat_estados_model                      $cat_estados_model
 * @property cat_municipios_model                   $cat_municipios_model
 * @property cat_paises_model                       $cat_paises_model
 * @property catalogos_model                        $catalogos_model
 * @property clientes_model                         $clientes_model
 * @property conceptos_model                        $conceptos_model
 * @property conceptos_model                        $con_model
 * @property conceptos_cat_model                    $conceptos_cat_model
 * @property conceptos_cat_model                    $con_cat_model
 * @property conceptos_categoria_model              $conceptos_categoria_model
 * @property conceptos_categoria_model              $con_cate_model
 * @property conceptos_catalogo_model               $conceptos_catalogo_model
 * @property conceptos_catalogo_model               $con_cata_model
 * @property empresas_departamentos_model           $empresas_departamentos_model
 * @property empresas_model                         $empresas_model
 * @property etapas_model                           $etapas_model
 * @property obras_etapas_fases_zonas_conceptos_model    $obras_etapas_fases_zonas_conceptos_model
 * @property obras_etapas_fases_zonas_conceptos_model    $oefzc_model
 * @property fases_model                            $fases_model
 * @property groups_model                           $groups_model
 * @property logs_oe_model                          $logs_oe_model
 * @property mano_de_obra_model                     $mano_de_obra_model
 * @property materiales_categoria_model             $materiales_categoria_model
 * @property materiales_model                       $materiales_model
 * @property materiales_ubicacion_model             $materiales_ubicacion_model
 * @property menu_model                             $menu_model
 * @property obras_model                            $obras_model
 * @property periodo_de_pago_model                  $periodo_de_pago_model
 * @property personal_contratos_model               $personal_contratos_model
 * @property personal_model                         $personal_model
 * @property proveedores_model                      $proveedores_model
 * @property registro_patronal_model                $registro_patronal_model
 * @property resources_model                        $resources_model
 * @property servicios_categoria_model              $servicios_categoria_model
 * @property servicios_model                        $servicios_model
 * @property tipos_regimen_model                    $tipos_regimen_model
 * @property unidades_model                         $unidades_model
 * @property users_model                            $users_model
 * @property zonas_model                            $zonas_model
 *
 */
class my_models extends my_business
{
}

/**
 * Add you custom business class here that you are loading in your controllers
 *
 * <code>
 * $this->business_class->get_records()
 * </code>
 * Where business_class is the Business Class
 *
 * ---------------------- Business to Load ----------------------
 * <examples>
 *
 * @property almacen                                $almacen
 * @property cliente                                $cliente
 * @property concepto                               $concepto
 * @property conceptos_catalogo                     $conceptos_catalogo
 * @property conceptos_categoria                    $conceptos_categoria
 * @property empresa                                $empresa
 * @property etapa                                  $etapa
 * @property fase                                   $fase
 * @property lugares                                $lugares
 * @property obra                                   $obra
 * @property obra_etapa_fase_zona_concepto          $obra_etapa_fase_zona_concepto
 * @property obra_etapa_fase_zona_concepto          $oefzc
 * @property zona                                   $zona
 */
class my_business
{
}